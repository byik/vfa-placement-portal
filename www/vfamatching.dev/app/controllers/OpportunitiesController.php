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
        $search = (!is_null(Input::get('search')) ? Input::get('search') : ''); //default to asc
        $opportunities = Opportunity::select('opportunities.*', 'companies.name')->join('companies', 'opportunities.company_id', '=', 'companies.id');
        if($search != ''){
            $opportunities = $opportunities->where('title', 'LIKE', "%$search%")
                    ->orWhere('companies.name', 'LIKE', "%$search%")
                    ->orWhere('description', 'LIKE', "%$search%")
                    ->orWhere('responsibilitiesAnswer', 'LIKE', "%$search%")
                    ->orWhere('skillsAnswer', 'LIKE', "%$search%")
                    ->orWhere('developmentAnswer', 'LIKE', "%$search%")
                    ->orWhere('opportunities.city', 'LIKE', "%$search%");
        }
        $opportunities = $opportunities->orderBy($sort, $order)->paginate(5);
        return View::make('opportunities.index', array('opportunities' => $opportunities, 'sort' => $sort, 'order' => $order, 'search' => $search));
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

}
