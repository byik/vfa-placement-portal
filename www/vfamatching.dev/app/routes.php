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
	$data['name'] = "Scott Lowe";

	Mail::send('emails.welcome', $data, function($message){
		$message->to('me@scottdlowe.com')->subject("It works!");
	});

	return View::make('index');
});