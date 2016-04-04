<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::group(['middleware' => ['web']], function () {

    // Route::get('/', function () {
    //     return view('welcome');
    // });

});

Route::group(['middleware' => 'web'], function () {
    Route::auth();

    Route::get('/home', 'HomeController@index');

    Route::get('/', 'HomeController@index');

    Route::get('/dependentsInfo', 'DependentsController@dependentsInfo');

    Route::get('/addDependent', 'DependentsController@showAddDependent');

	Route::post('/addDependent', 'DependentsController@addDependent'); 

	Route::post('/deleteDependents', 'DependentsController@deleteDependents');    

	Route::get('/visaInfo', 'VisaInfoController@visaInfo');
});

Event::listen('illuminate.query', function($query)
{
    var_dump($query);
});
