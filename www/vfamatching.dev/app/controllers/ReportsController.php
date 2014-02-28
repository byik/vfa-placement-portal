<?php

class ReportsController extends BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
        return View::make('reports.index');
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
        // return View::make('reports.create');
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($type)
	{
		switch ($type) {
		    case "fellows":		    	
		    	$data = Fellow::generateReportData();		    	
		        return View::make('reports.show')->with('heading', 'Unplaced Fellows Report')->with('data', $data);
		        break;
		    case "companies":
	        	$data = Company::generateReportData();		    	
	            return View::make('reports.show')->with('heading', 'Unfilled Opportunities Report')->with('data', $data)->with('sort',json_encode([[0,0],[1,0]]));
		        break;
		    case "placementStatuses":
		    	$limit = Input::has('limit') ? Input::get('limit') : 5;
	        	$data = PlacementStatus::generateReportData($limit);		    	
	            return View::make('reports.show')->with('heading', 'Recent Placement Updates Report')->with('data', $data)->with('sort',json_encode([[4,1]]))->with('limit',$limit);
		        break;
		    case "custom":
		        echo "TODO: Custom Report";
		        break;
		    default:
		       return View::make('404')->with('error', 'Invalid Report type!');
		}
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
        // return View::make('reports.edit');
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
