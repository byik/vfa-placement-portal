<?php

class AdminNotesController extends BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
        return View::make('adminnotes.index');
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
        return View::make('adminnotes.create');
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
	    $entityType = Input::get('entityType');
        $entityId = Input::get('entityId');
        $admin = Auth::user()->profile;
        $content = Input::get('content');

        $adminNote = new AdminNote();
        $adminNote->content = $content;
        $adminNote->admin_id = $admin->id;

        try {
            $adminNote->save();
            if($entityType == "Fellow"){
                $entity = Fellow::find($entityId);
            } elseif($entityType == "Company"){
                $entity = Company::find($entityId);
            } elseif($entityType == "Opportunity"){
                $entity = Opportunity::find($entityId);
            } else {
                throw new Exception('Invalid note type');
            }
            $entity->adminNotes()->save($adminNote);
        } catch (ValidationFailedException $e) {
            return Redirect::back()->with('validation_errors', $e->getErrorMessages())->withInput();
        } catch (\Illuminate\Database\Eloquent\ModelNotFoundException $e) {
            return Redirect::back()->with('flash_error', 'Invalid $entityType')->withInput();
        }

        return Redirect::back()->with('flash_success', 'Note saved.');
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
        return View::make('adminnotes.show');
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
        return View::make('adminnotes.edit');
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
