<?php

class FellowNotesController extends BaseController {

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        return View::make('fellownotes.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        return View::make('fellownotes.create');
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
        $fellow = Auth::user()->profile;
        $content = Input::get('content');

        $fellowNote = new FellowNote();
        $fellowNote->content = $content;
        $fellowNote->fellow_id = $fellow->id;

        try {
            $fellowNote->save();
            if($entityType == "Company"){
                $entity = Company::find($entityId);
            } elseif($entityType == "Opportunity"){
                $entity = Opportunity::find($entityId);
            } else {
                throw new Exception('Invalid note type');
            }
            $entity->fellowNotes()->save($fellowNote);
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
        return View::make('fellownotes.show');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
        return View::make('fellownotes.edit');
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
