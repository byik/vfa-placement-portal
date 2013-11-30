<?php

class FellowsController extends BaseController {

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        return View::make('fellows.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        return View::make('fellows.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store()
    {
        $authenticatedUser = Auth::user();
        $authenticatedUser->firstName = Input::get('firstName');
        $authenticatedUser->lastName = Input::get('lastName');
        $authenticatedUser->email = Input::get('email');

        $newFellow = new Fellow();
        $newFellow->user_id = Auth::user()->id;
        $newFellow->isPublished = 1;
        $newFellow->isRemindable = 1;
        $newFellow->bio = Input::get('bio');
        $newFellow->school = Input::get('school');
        $newFellow->major = Input::get('major');
        $newFellow->degree = Input::get('degree');
        $newFellow->graduationYear = Parser::stringToInteger(Input::get('graduationYear'));
        $newFellow->hometown = Input::get('hometown');
        $newFellow->phoneNumber = Parser::stringToInteger(Input::get('phoneNumber'));

        try {
            $authenticatedUser->save();
            $newFellow->save();
        } catch (ValidationFailedException $e) {
            return Redirect::back()->with('validation_errors', $e->getErrorMessages())->withInput();
        }

        return Redirect::route('dashboard')->with('flash_notice', 'Profile successfully updated.');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {
        return View::make('fellows.show', array('fellow' => Fellow::find($id)));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
        return View::make('fellows.edit');
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
