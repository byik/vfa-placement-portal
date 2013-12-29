<?php

class PitchesController extends BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
        return View::make('pitches.index');
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
        return View::make('pitches.create');
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$newPitch = new Pitch();
        $newPitch->fellow_id = Input::get('fellow_id');
        $newPitch->opportunity_id = Input::get('opportunity_id');
        $newPitch->status = "Under Review";
        $newPitch->body = Input::get('body');

        try {
            $newPitch->save();
            //make sure only this new placement status is recent
            return Redirect::back()->with('flash_notice', 'Pitch successfully submitted.');
        } catch (ValidationFailedException $e) {
            return Redirect::back()->with('validation_errors', $e->getErrorMessages());
        }
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
        return View::make('pitches.show');
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
        return View::make('pitches.edit');
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

	public function approve($id)
    {
        try{
            $pitch = Pitch::findOrFail($id);
        } catch (\Illuminate\Database\Eloquent\ModelNotFoundException $e) {
            return View::make('404')->with('error', 'Pitch not found!');
        }
        $pitch->status = "Approved";
        $pitch->save();
        return Redirect::back()->with('flash_notice', "Pitch approved!");
    }

    public function waitlist($id)
    {
        try{
            $pitch = Pitch::findOrFail($id);
        } catch (\Illuminate\Database\Eloquent\ModelNotFoundException $e) {
            return View::make('404')->with('error', 'Pitch not found!');
        }
        $pitch->status = "Waitlisted";
        $pitch->save();
        return Redirect::back()->with('flash_notice', "Pitch waitlisted");
    }

}
