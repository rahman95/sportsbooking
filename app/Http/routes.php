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

    Route::get('/home/viewbookings', 'HomeController@viewbookings');

    Route::get('/home/edit/{id}', 'HomeController@edit');

    Route::get('/home/editpass/{id}', 'HomeController@editpass');

    Route::post('home/edit', 'HomeController@update');

    Route::post('home/editpass', 'HomeController@updatepass');

    Route::get('/book/facility', 'FacilityController@index');

    Route::post('/book/facility', 'FacilityController@store');

    Route::get('/book/class', 'ClassController@index');

    Route::post('/book/class', 'ClassController@store');

    Route::get('/book/class/show/{id}', 'ClassController@show');

    Route::get('/book/class/edit/{id}', 'ClassController@edit');

    Route::post('/book/class/update/{id}', 'ClassController@update');

    Route::get('/book/facility/show/{id}', 'FacilityController@show');

    Route::get('/book/facility/edit/{id}', 'FacilityController@edit');

    Route::post('/book/facility/update/{id}', 'FacilityController@update');
});



