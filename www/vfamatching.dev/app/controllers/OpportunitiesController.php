<?php

class OpportunitiesController extends BaseController {

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        // $opportunities = Opportunity::all();
        $sort = (!is_null(Input::get('sort')) ? Input::get('sort') : 'companies.name'); //default to company name
        $order = (!is_null(Input::get('order')) ? Input::get('order') : 'asc'); //default to asc
        $search = (!is_null(Input::get('search')) ? Input::get('search') : ''); //default to empty string
        $limit = (!is_null(Input::get('limit')) ? Input::get('limit') : 5); //default to 5
        $opportunities = Opportunity::select('opportunities.*', 'companies.name')
            ->join('companies', 'opportunities.company_id', '=', 'companies.id')
            ->leftJoin('opportunityTags', 'opportunities.id', '=', 'opportunityTags.opportunity_id');
        if($search != ''){
            $searchTerms = explode(' ', $search);
            foreach($searchTerms as $searchTerm){
                $opportunities = $opportunities->Where('title', 'LIKE', "%$searchTerm%")
                    ->orWhere('companies.name', 'LIKE', "%$searchTerm%")
                    ->orWhere('teaser', 'LIKE', "%$searchTerm%")
                    ->orWhere('description', 'LIKE', "%$searchTerm%")
                    ->orWhere('responsibilitiesAnswer', 'LIKE', "%$searchTerm%")
                    ->orWhere('skillsAnswer', 'LIKE', "%$searchTerm%")
                    ->orWhere('developmentAnswer', 'LIKE', "%$searchTerm%")
                    ->orWhere('opportunities.city', 'LIKE', "%$searchTerm%")
                    ->orWhere('opportunityTags.tag', 'LIKE', "%$searchTerm%");
            }
        }
        $opportunities = $opportunities->orderBy($sort, $order)->groupBy('opportunities.id')->having('isPublished', '=', true)->paginate($limit);
        $pills  = array();
            array_push($pills, new Pill("Title", array(
                    new DropdownItem("", URL::route( 'opportunities.index', array('sort' => 'title', 'order' => 'asc', 'search' => $search, 'limit' => $limit)), "sort-alpha-asc"),
                    new DropdownItem("", URL::route( 'opportunities.index', array('sort' => 'title', 'order' => 'desc', 'search' => $search, 'limit' => $limit)), "sort-alpha-desc")
                )));
            array_push($pills, new Pill("Company", array(
                    new DropdownItem("", URL::route( 'opportunities.index', array('sort' => 'companies.name', 'order' => 'asc', 'search' => $search, 'limit' => $limit)), "sort-alpha-asc"),
                    new DropdownItem("", URL::route( 'opportunities.index', array('sort' => 'companies.name', 'order' => 'desc', 'search' => $search, 'limit' => $limit)), "sort-alpha-desc")
                )));
            array_push($pills, new Pill("City", array(
                    new DropdownItem("", URL::route( 'opportunities.index', array('sort' => 'city', 'order' => 'asc', 'search' => $search, 'limit' => $limit)), "sort-alpha-asc"),
                    new DropdownItem("", URL::route( 'opportunities.index', array('sort' => 'city', 'order' => 'desc', 'search' => $search, 'limit' => $limit)), "sort-alpha-desc")
                )));
            array_push($pills, new Pill("Date Added", array(
                    new DropdownItem("Oldest first", URL::route( 'opportunities.index', array('sort' => 'created_at', 'order' => 'asc', 'search' => $search, 'limit' => $limit))),
                    new DropdownItem("Newest first", URL::route( 'opportunities.index', array('sort' => 'created_at', 'order' => 'desc', 'search' => $search, 'limit' => $limit)))
                )));
        return View::make('opportunities.index', array('total' => Opportunity::Where('isPublished', '=', true)->count(), 'opportunities' => $opportunities, 'sort' => $sort, 'order' => $order, 'search' => $search, 'limit' => $limit, 'pills' => $pills));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        return View::make('opportunities.create');
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
            $opportunity = Opportunity::findOrFail($id);
        } catch (\Illuminate\Database\Eloquent\ModelNotFoundException $e) {
            return View::make('404')->with('error', 'Opportunity not found!');
        }
        return View::make('opportunities.show')->with('opportunity',$opportunity);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
        return View::make('opportunities.edit');
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
            $opportunity = Opportunity::findOrFail($id);
        } catch (\Illuminate\Database\Eloquent\ModelNotFoundException $e) {
            return View::make('404')->with('error', 'Opportunity not found!');
        }
        $opportunity->isPublished = true;
        $opportunity->save();
        return Redirect::back()->with('flash_notice', "Opportunity published");
    }

    public function unpublish($id)
    {
        try{
            $opportunity = Opportunity::findOrFail($id);
        } catch (\Illuminate\Database\Eloquent\ModelNotFoundException $e) {
            return View::make('404')->with('error', 'Opportunity not found!');
        }
        //TODO: Cascade the effects of unpublishing an opportunity
        $opportunity->isPublished = false;
        $opportunity->save();
        return Redirect::back()->with('flash_notice', "Opportunity unpublished");
    }

}
