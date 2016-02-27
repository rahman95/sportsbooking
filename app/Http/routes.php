<?php

/*
|--------------------------------------------------------------------------
| Routes File
|--------------------------------------------------------------------------
|
| Here is where you will register all of the routes in an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/


/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| This route group applies the "web" middleware group to every route
| it contains. The "web" middleware group is defined in your HTTP
| kernel and includes session state, CSRF protection, and more.
|
*/




Route::group(['middleware' => 'web'], function () {
    Route::auth();

    Route::get('/book',function() {
    return view('book');
	});

    Route::get('/',function(){
    	return view('welcome');
    });

	Route::get('/classes',function() {
	    return view('classes');
	});

	Route::get('/facilities',function() {
	    return view('facilities');
	});

	Route::get('/contact',function() {
	    return view('contact');
	});

    Route::get('/home', 'HomeController@index');
});



