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

Route::get('login', array('as' => 'login', function () { return View::make('login'); }))->before('guest');
Route::post('login', 'UsersController@login');
Route::get('logout', array('uses' => 'UsersController@logout', 'as' => 'logout'))->before('auth');

Route::group(array('before' => 'auth'), function()
{
    /* These routes are available to users without profiles */
    Route::get('fellows/create', array('uses' => 'FellowsController@create'));
    Route::post('fellows', array('uses' => 'FellowsController@store'));
    Route::group(array('before' => 'profile'), function()
    {
        Route::get('/', array('as' => 'dashboard', 'uses' => 'UsersController@dashboard'));
        Route::resource('users', 'UsersController');
        Route::resource('companies', 'CompaniesController');
        Route::resource('medialinks', 'MedialinksController');
        Route::resource('fellows', 'FellowsController');
        Route::resource('opportunities', 'OpportunitiesController');
        Route::resource('hiringmanagers', 'HiringmanagersController');
        Route::resource('admins', 'AdminsController');
        Route::resource('placementstatuses', 'PlacementstatusesController');
        Route::resource('adminnotes', 'AdminnotesController');
        Route::resource('pitches', 'PitchesController');
        Route::resource('fellowskills', 'FellowskillsController');
        Route::resource('opportunitytags', 'OpportunitytagsController');
        Route::resource('staffrecommendations', 'StaffrecommendationsController');
    });
});
