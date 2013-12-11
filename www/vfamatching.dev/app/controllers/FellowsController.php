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

        if (Input::hasFile('displayPicture'))
        {
            //process file input
            //TODO: Validate that this is an image
            $newName = Uploader::processInputFilename(Input::file('displayPicture')->getClientOriginalName());
            try{
                Input::file('displayPicture')->move(public_path() . Config::get('upload.directory'), $newName);
            } catch (FileException $e) {
                return Redirect::back()->with('flash_error', "Your file could not be uploaded. Please try again")->withInput();
            }
            $newFellow->displayPicturePath = Config::get('upload.directory') . '/' . $newName;
        }

        if (Input::hasFile('resume'))
        {
            //process file input
            //TODO: Validate that this is a pdf
            $newName = Uploader::processInputFilename(Input::file('resume')->getClientOriginalName());
            try{
                Input::file('resume')->move(public_path() . Config::get('upload.directory'), $newName);
            } catch (FileException $e) {
                return Redirect::back()->with('flash_error', "Your file could not be uploaded. Please try again")->withInput();
            }
            $newFellow->resumePath = Config::get('upload.directory') . '/' . $newName;
        }

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
        try{
            $fellow = Fellow::findOrFail($id);
        } catch (\Illuminate\Database\Eloquent\ModelNotFoundException $e) {
            return View::make('404')->with('error', 'Fellow not found!');
        }
        return View::make('fellows.show', array('fellow' => $fellow));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
        try{
            $fellow = Fellow::findOrFail($id);
        } catch (\Illuminate\Database\Eloquent\ModelNotFoundException $e) {
            return View::make('404')->with('error', 'Fellow not found!');
        }
        return View::make('fellows.edit', array('fellow' => $fellow));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function update($id)
    {
        $authenticatedUser = Auth::user();
        $authenticatedUser->firstName = Input::get('firstName');
        $authenticatedUser->lastName = Input::get('lastName');
        $authenticatedUser->email = Input::get('email');

        try{
            $fellow = Fellow::findOrFail($id);
        } catch (\Illuminate\Database\Eloquent\ModelNotFoundException $e) {
            return View::make('404')->with('error', 'Trying to update a fellow that doesn\'t exist!');
        }
        $fellow->user_id = Auth::user()->id;
        $fellow->isPublished = 1;
        $fellow->isRemindable = 1;
        $fellow->bio = Input::get('bio');
        $fellow->school = Input::get('school');
        $fellow->major = Input::get('major');
        $fellow->degree = Input::get('degree');
        $fellow->graduationYear = Parser::stringToInteger(Input::get('graduationYear'));
        $fellow->hometown = Input::get('hometown');
        $fellow->phoneNumber = Parser::stringToInteger(Input::get('phoneNumber'));

        if (Input::hasFile('displayPicture'))
        {
            //process file input
            //TODO: Validate that this is an image
            $newName = Uploader::processInputFilename(Input::file('displayPicture')->getClientOriginalName());
            try{
                Input::file('displayPicture')->move(public_path() . Config::get('upload.directory'), $newName);
            } catch (FileException $e) {
                return Redirect::back()->with('flash_error', "Your file could not be uploaded. Please try again")->withInput();
            }
            $fellow->displayPicturePath = Config::get('upload.directory') . '/' . $newName;
        }

        if (Input::hasFile('resume'))
        {
            //process file input
            //TODO: Validate that this is a pdf
            $newName = Uploader::processInputFilename(Input::file('resume')->getClientOriginalName());
            try{
                Input::file('resume')->move(public_path() . Config::get('upload.directory'), $newName);
            } catch (FileException $e) {
                return Redirect::back()->with('flash_error', "Your file could not be uploaded. Please try again")->withInput();
            }
            $fellow->resumePath = Config::get('upload.directory') . '/' . $newName;
        }

        try {
            $authenticatedUser->save();
            $fellow->save();
        } catch (ValidationFailedException $e) {
            return Redirect::back()->with('validation_errors', $e->getErrorMessages())->withInput();
        }

        return Redirect::route('fellows.show', $fellow->id)->with('flash_notice', 'Profile successfully updated.');
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
