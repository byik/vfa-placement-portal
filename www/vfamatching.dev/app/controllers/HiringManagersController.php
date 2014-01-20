<?php

class HiringManagersController extends BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
        return View::make('hiringmanagers.index');
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
        return View::make('hiringmanagers.create');
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

        $newHiringManager = new HiringManager();
        $newHiringManager->user_id = Auth::user()->id;
        $newHiringManager->company_id = Input::get('company_id');
        $newHiringManager->phoneNumber = Parser::stringToInteger(Input::get('phoneNumber'));

        try {
            $authenticatedUser->save();
            $newHiringManager->save();
        } catch (ValidationFailedException $e) {
            return Redirect::back()->with('validation_errors', $e->getErrorMessages())->withInput();
        }

        return Redirect::route('dashboard')->with('flash_success', 'Profile successfully updated.');
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
        return View::make('hiringmanagers.show');
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
            $hiringManager = HiringManager::findOrFail($id);
        } catch (\Illuminate\Database\Eloquent\ModelNotFoundException $e) {
            return View::make('404')->with('error', 'Hiring Manager not found!');
        }
        return View::make('hiringmanagers.edit')->with('hiringManager',$hiringManager);
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
            $hiringManager = HiringManager::findorFail($id);
        } catch (\Illuminate\Database\Eloquent\ModelNotFoundException $e) {
            return View::make('404')->with('error', 'Can\'t update a Hiring Manager that doesn\t exist!');
        }
        $hiringManager->phoneNumber = empty(Input::get('phoneNumber')) ? null : Parser::stringToInteger(Input::get('phoneNumber'));

        try {
            $authenticatedUser->save();
            $hiringManager->save();
        } catch (ValidationFailedException $e) {
            return Redirect::back()->with('validation_errors', $e->getErrorMessages())->withInput();
        }

        return Redirect::route('dashboard')->with('flash_success', 'Profile successfully updated.');
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
