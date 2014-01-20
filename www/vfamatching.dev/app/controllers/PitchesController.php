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
            return Redirect::back()->with('flash_success', 'Pitch successfully submitted.');
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
            if(Auth::user()->role == "Hiring Manager"){
                if($pitch->hasAdminApproval){
                    $pitch->status = "Approved";
                    $pitch->save();
                    //introduce the two
                    $newPlacementStatus = new PlacementStatus();
                    $newPlacementStatus->fellow_id = $pitch->fellow_id;
                    $newPlacementStatus->opportunity_id = $pitch->opportunity_id;
                    $newPlacementStatus->fromRole = "Admin";
                    $newPlacementStatus->status = "Introduced";
                    $newPlacementStatus->eventDate = null;
                    $newPlacementStatus->score = null;
                    $newPlacementStatus->message = "";
                    $newPlacementStatus->isRecent = 1;
                    $newPlacementStatus->save();
                } else {
                    throw new Exception("Hiring Managers can't approve Pitches until they've been approved by an Admin!");
                }
            } elseif(Auth::user()->role == "Admin"){
                $pitch->hasAdminApproval = true;
                $pitch->save();
            } else {
                throw new Exception("Only Admins and Hiring Managers can approve pitches!");
            }
        } catch (\Illuminate\Database\Eloquent\ModelNotFoundException $e) {
            return View::make('404')->with('error', 'Pitch not found!');
        } catch (ValidationFailedException $e) {
            return Redirect::back()->with('validation_errors', $e->getErrorMessages());
        }
        return Redirect::back()->with('flash_success', "Pitch approved!");
    }

    public function waitlist($id)
    {
        try{
            $pitch = Pitch::findOrFail($id);
	        $pitch->status = "Waitlisted";
	        $pitch->save();
        } catch (\Illuminate\Database\Eloquent\ModelNotFoundException $e) {
            return View::make('404')->with('error', 'Pitch not found!');
        } catch (ValidationFailedException $e) {
            return Redirect::back()->with('validation_errors', $e->getErrorMessages());
        }
        return Redirect::back()->with('flash_success', "Pitch waitlisted");
    }

}
