<?php

class CompaniesController extends BaseController {

    public function __construct()
    {
        // Exit if not admin or a fellow
        $this->beforeFilter('adminOrFellow', array('only' => array('index', 'show')));
    }

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
        $sort = (!is_null(Input::get('sort')) ? Input::get('sort') : 'name'); //default to name
        $order = (!is_null(Input::get('order')) ? Input::get('order') : 'asc'); //default to asc
        $search = (!is_null(Input::get('search')) ? Input::get('search') : ''); //default to empty string
        $limit = (!is_null(Input::get('limit')) ? Input::get('limit') : 5); //default to 5
        $companies = Company::select('companies.*');
        if($search != ''){
            $searchTerms = explode(' ', $search);
            foreach($searchTerms as $searchTerm){
                $companies = $companies->where('name', 'LIKE', "%$searchTerm%")
                    ->orWhere('tagline', 'LIKE', "%$searchTerm%")
                    ->orWhere('city', 'LIKE', "%$searchTerm%")
                    ->orWhere('url', 'LIKE', "%$searchTerm%")
                    ->orWhere('visionAnswer', 'LIKE', "%$searchTerm%")
                    ->orWhere('needsAnswer', 'LIKE', "%$searchTerm%")
                    ->orWhere('teamAnswer', 'LIKE', "%$searchTerm%")
                    ->orWhere('employees', '=', $searchTerm)
                    ->orWhere('twitterHandle', 'LIKE', "%$searchTerm%");
            }
        }
        $companies = $companies->orderBy($sort, $order)->groupBy('companies.id')->having('isPublished', '=', true)->paginate($limit);
        $pills  = array();
            array_push($pills, new Pill("Name", array(
                    new DropdownItem("", URL::route( 'companies.index', array('sort' => 'name', 'order' => 'asc', 'search' => $search, 'limit' => $limit)), "sort-alpha-asc"),
                    new DropdownItem("", URL::route( 'companies.index', array('sort' => 'name', 'order' => 'desc', 'search' => $search, 'limit' => $limit)), "sort-alpha-desc")
                )));
            array_push($pills, new Pill("City", array(
                    new DropdownItem("", URL::route( 'companies.index', array('sort' => 'city', 'order' => 'asc', 'search' => $search, 'limit' => $limit)), "sort-alpha-asc"),
                    new DropdownItem("", URL::route( 'companies.index', array('sort' => 'city', 'order' => 'desc', 'search' => $search, 'limit' => $limit)), "sort-alpha-desc")
                )));
            array_push($pills, new Pill("Employees", array(
                    new DropdownItem("", URL::route( 'companies.index', array('sort' => 'employees', 'order' => 'asc', 'search' => $search, 'limit' => $limit)), "sort-numeric-asc"),
                    new DropdownItem("", URL::route( 'companies.index', array('sort' => 'employees', 'order' => 'desc', 'search' => $search, 'limit' => $limit)), "sort-numeric-desc")
                )));
            array_push($pills, new Pill("Founded", array(
                    new DropdownItem("Oldest first", URL::route( 'companies.index', array('sort' => 'yearFounded', 'order' => 'asc', 'search' => $search, 'limit' => $limit)), ""),
                    new DropdownItem("Youngest first", URL::route( 'companies.index', array('sort' => 'yearFounded', 'order' => 'desc', 'search' => $search, 'limit' => $limit)), "")
                )));
            array_push($pills, new Pill("Date Added", array(
                    new DropdownItem("Oldest first", URL::route( 'companies.index', array('sort' => 'created_at', 'order' => 'asc', 'search' => $search, 'limit' => $limit))),
                    new DropdownItem("Newest first", URL::route( 'companies.index', array('sort' => 'created_at', 'order' => 'desc', 'search' => $search, 'limit' => $limit)))
                )));
        return View::make('companies.index', array('total' => Company::Where('isPublished', '=', true)->count(), 'companies' => $companies, 'sort' => $sort, 'order' => $order, 'search' => $search, 'limit' => $limit, 'pills' => $pills));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
        return View::make('companies.create');
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
        try{
            $company = Company::findOrFail($id);
        } catch (\Illuminate\Database\Eloquent\ModelNotFoundException $e) {
            return View::make('404')->with('error', 'Company not found!');
        }
        return View::make('companies.show', array('company' => $company));
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
        return View::make('companies.edit');
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

    public function publish($id)
    {
        try{
            $company = Company::findOrFail($id);
        } catch (\Illuminate\Database\Eloquent\ModelNotFoundException $e) {
            return View::make('404')->with('error', 'Company not found!');
        }
        $company->isPublished = true;
        $company->save();
        return Redirect::back()->with('flash_notice', "Company published");
    }

    public function unpublish($id)
    {
        try{
            $company = Company::findOrFail($id);
        } catch (\Illuminate\Database\Eloquent\ModelNotFoundException $e) {
            return View::make('404')->with('error', 'Company not found!');
        }
        foreach($company->opportunities as $opportunity){
            $opportunity->isPublished = false;
            $opportunity->save();
        }
        $company->isPublished = false;
        $company->save();
        return Redirect::back()->with('flash_notice', "Company unpublished");
    }

}
