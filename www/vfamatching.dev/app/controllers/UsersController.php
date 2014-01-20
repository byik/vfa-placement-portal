<?php

class UsersController extends BaseController {

	public function __construct()
    {
        // Exit if not admin
        $this->beforeFilter('admin', array('only' => array('index', 'create', 'store')));
    }

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
        $sort = (!is_null(Input::get('sort')) ? Input::get('sort') : 'users.email'); //default to company name
        $order = (!is_null(Input::get('order')) ? Input::get('order') : 'asc'); //default to asc
        $search = (!is_null(Input::get('search')) ? Input::get('search') : ''); //default to empty string
        $limit = (!is_null(Input::get('limit')) ? Input::get('limit') : 5); //default to 5
        $users = User::select('users.email', 'users.lastLogin', 'users.role', 'users.firstName', 'users.lastName');
        if($search != ''){
            $searchTerms = explode(' ', $search);
            foreach($searchTerms as $searchTerm){
                $users = $users->where('email', 'LIKE', "%$searchTerm%")
                        ->orWhere('firstName', 'LIKE', "%$searchTerm%")
                        ->orWhere('lastName', 'LIKE', "%$searchTerm%")
                        ->orWhere('role', 'LIKE', "%$searchTerm%");
            }
        }
        $users = $users->orderBy($sort, $order)->groupBy('id')->paginate($limit);
        $pills  = array();
            array_push($pills, new Pill("Email", array(
                    new DropdownItem("", URL::route( 'users.index', array('sort' => 'email', 'order' => 'asc', 'search' => $search, 'limit' => $limit)), "sort-alpha-asc"),
                    new DropdownItem("", URL::route( 'users.index', array('sort' => 'email', 'order' => 'desc', 'search' => $search, 'limit' => $limit)), "sort-alpha-desc")
                )));
            array_push($pills, new Pill("Role", array(
                    new DropdownItem("", URL::route( 'users.index', array('sort' => 'role', 'order' => 'asc', 'search' => $search, 'limit' => $limit)), "sort-alpha-asc"),
                    new DropdownItem("", URL::route( 'users.index', array('sort' => 'role', 'order' => 'desc', 'search' => $search, 'limit' => $limit)), "sort-alpha-desc")
                )));
            array_push($pills, new Pill("First Name", array(
                    new DropdownItem("", URL::route( 'users.index', array('sort' => 'firstName', 'order' => 'asc', 'search' => $search, 'limit' => $limit)), "sort-alpha-asc"),
                    new DropdownItem("", URL::route( 'users.index', array('sort' => 'firstName', 'order' => 'desc', 'search' => $search, 'limit' => $limit)), "sort-alpha-desc")
                )));
            array_push($pills, new Pill("Last Name", array(
                    new DropdownItem("", URL::route( 'users.index', array('sort' => 'lastName', 'order' => 'asc', 'search' => $search, 'limit' => $limit)), "sort-alpha-asc"),
                    new DropdownItem("", URL::route( 'users.index', array('sort' => 'lastName', 'order' => 'desc', 'search' => $search, 'limit' => $limit)), "sort-alpha-desc")
                )));
            array_push($pills, new Pill("Date Added", array(
                    new DropdownItem("Oldest First", URL::route( 'users.index', array('sort' => 'created_at', 'order' => 'asc', 'search' => $search, 'limit' => $limit)), "sort-alpha-asc"),
                    new DropdownItem("Newest First", URL::route( 'users.index', array('sort' => 'created_at', 'order' => 'desc', 'search' => $search, 'limit' => $limit)), "sort-alpha-desc")
                )));
        return View::make('users.index', array('total' => User::count(), 'users' => $users, 'sort' => $sort, 'order' => $order, 'search' => $search, 'limit' => $limit, 'pills' => $pills));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
        return View::make('users.create', array('companyPicker' => Company::dropdownOfAllNames()));
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		// die(json_encode(Input::all()));
		if(Input::get('role') == "Hiring Manager"){
			//Hiring managers have special needs, create or get the company
			if(Input::get('company') == 0){
				//create company
				$company = new Company();
				$company->name = Input::get('new-company');
				try {
			        $company->save(array('adminValidation'=>true));
			    } catch (ValidationFailedException $e) {
			        return Redirect::back()->with('validation_errors', $e->getErrorMessages())->withInput();
			    }
			} else {
				//lookup company
				try{
		            $company = Company::findOrFail(Input::get('company'));
		        } catch (\Illuminate\Database\Eloquent\ModelNotFoundException $e) {
		            return View::make('404')->with('error', 'Company not found!');
		        }
			}
		}

		//now try to create the new user
		$user = new User();
		$user->firstName = Input::get('firstName');
		$user->lastName = Input::get('lastName');
		$user->email = Input::get('email');
		//NOTE: THIS IS A HUGE FUCKING SECURITY FLAW. RANDOMIZE THIS SHIT AND EMAIL IT OUT ONCE EMAIL IS WORKING
		$user->password = Hash::make("fakepassword");
		$user->role = Input::get('role');
		try {
	        $user->save(array('adminValidation'=>true));
	        //TODO EMAIL THE NEW USER
	    } catch (ValidationFailedException $e) {
	        return Redirect::back()->with('validation_errors', $e->getErrorMessages())->withInput();
	    }

		//Create Hiring Manager and Company if this new user is a hiring manager
		// (this is required so that admins can control which hiring mangers
		// belong to which companies)
		if(Input::get('role') == "Hiring Manager"){
			$hiringManager = new HiringManager();
			$hiringManager->user_id = $user->id;
			$hiringManager->company_id = $company->id;
			try {
				$hiringManager->save(array('adminValidation'=>true));
		    } catch (ValidationFailedException $e) {
		        return Redirect::back()->with('validation_errors', $e->getErrorMessages())->withInput();
		    }
		}
		return Redirect::route('users.index')->with('flash_success', 'User added!');
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
        return View::make('users.show');
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
        return View::make('users.edit');
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		//
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		//
	}

	public function login() 
	{ 
		$user = array(
			'email' => Input::get('email'),
			'password' => Input::get('password')
		);   
		if (Auth::attempt($user)) {
            Auth::user()->login();
            Auth::user()->lastLogin = Carbon::now();
            Auth::user()->save();
			if (Session::has('returnUrl'))
			{
				$intendedDestination = Session::get('returnUrl');
				Session::forget('returnUrl');
			    return Redirect::to($intendedDestination)
		    	->with('flash_success', 'You are successfully logged in.');
			}
			return Redirect::to('/')
		    	->with('flash_success', 'You are successfully logged in.');
		}
		// authentication failure! lets go back to the login page
		return Redirect::route('login')
			->with('flash_error', 'Your username/password combination was incorrect.')
			->withInput();
	}

	public function logout() {
	    Auth::logout();

	    return Redirect::route('login')
	        ->with('flash_success', 'You are successfully logged out.');
	}

    public function dashboard() {
        if( Auth::user()->role == "Admin" ) {
            return View::make('index', array(
                'placedFellowPercent' => Fellow::percentWithAcceptedOffer(),
                'placementProgressHistogram' => Fellow::placementProgressHistogram(),
                'newPitches' => Pitch::underReview()
                ));
        } elseif( Auth::user()->role == "Fellow") {
            $placementStatuses = Auth::user()->profile
                ->placementStatuses()
                ->where('isRecent','=',1)
                ->where('status', '<>', 'Bad Fit')
                ->orderBy('created_at', 'DESC')
                ->get();
            return View::make('index', array('placementStatuses' => $placementStatuses));
        } elseif( Auth::user()->role == "Hiring Manager" ) {
            return View::make('index');
        } else {
            throw new Exception("Invalid user role");
        }
        return View::make('index');
    }

}
