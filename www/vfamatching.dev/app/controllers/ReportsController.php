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
		        return View::make('reports.show')->with('heading', 'Published Fellows Report')->with('data', $data);
		        break;
		    case "companies":
		        echo "TODO: Companies Report";
		        break;
		    case "placementStatuses":
		        echo "TODO: Placement Statuses Report";
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
