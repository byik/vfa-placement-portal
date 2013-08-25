<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/

Route::get('/', function()
{
	$user = User::first();
	$mailer = new Mailers\UserMailer($user);
	if($mailer->welcome()->deliver()){
		echo "Sent";
	} else {
		echo "Not Sent";
	}

	// return View::make('index');
});