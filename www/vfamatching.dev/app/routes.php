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
    Route::get('hiringmanagers/create', array('uses' => 'HiringmanagersController@create'));
    Route::post('hiringmanagers', array('uses' => 'HiringmanagersController@store'));
    Route::get('hiringmanagers/{id}/edit', array('uses' => 'HiringmanagersController@edit'));
    Route::put('hiringmanagers/{id}', array('uses' => 'HiringmanagersController@update'));
    Route::group(array('before' => 'profile'), function() /* Requires a profile to be created before using the site */
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
        Route::group(array('before' => 'admin'), function() /* Requires the user to be an admin */
        {
            Route::put('fellows/{id}/publish', 'FellowsController@publish');
            Route::put('fellows/{id}/unpublish', 'FellowsController@unpublish');
            Route::put('opportunities/{id}/publish', 'OpportunitiesController@publish');
            Route::put('opportunities/{id}/unpublish', 'OpportunitiesController@unpublish');
        });
    });
});
