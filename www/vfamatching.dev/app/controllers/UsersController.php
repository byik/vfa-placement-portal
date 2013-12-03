<?php

class UsersController extends BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
        return View::make('users.index');
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
        return View::make('users.create');
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		//
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
			if (Session::has('returnUrl'))
			{
				$intendedDestination = Session::get('returnUrl');
				Session::forget('returnUrl');
			    return Redirect::to($intendedDestination)
		    	->with('flash_notice', 'You are successfully logged in.');
			}
			return Redirect::to('/')
		    	->with('flash_notice', 'You are successfully logged in.');
		}
		// authentication failure! lets go back to the login page
		return Redirect::route('login')
			->with('flash_error', 'Your username/password combination was incorrect.')
			->withInput();
	}

	public function logout() {
	    Auth::logout();

	    return Redirect::route('login')
	        ->with('flash_notice', 'You are successfully logged out.');
	}

    public function dashboard() {
        if( Auth::user()->role == "Admin" ) {
            throw new Exception("TODO: Logic not implemented for Admin dashboard");
        } elseif( Auth::user()->role == "Fellow") {
            $placementStatuses = Auth::user()->profile->placementStatuses()->where('isRecent','=',1)->get();
            return View::make('index', array('placementStatuses' => $placementStatuses));
        } elseif( Auth::user()->role == "Hiring Manager" ) {
            throw new Exception("TODO: Logic not implemented for Hiring Manager dashboard");
        } else {
            throw new Exception("Invalid user role");
        }
        return View::make('index');
    }

}
