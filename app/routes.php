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

Route::get('/', ['before' => 'auth', 'uses' => 'HomeController@index']);

/* login */
Route::get('login', function(){
	return View::make('login');
});
Route::post('check_login', function(){
	if (Auth::attempt(array('username' => Input::get('username'), 'password' => Input::get('password')))){
	    return Redirect::intended('/');
	}else{
		return Redirect::to('login');
	}
});


Route::post('kick_user', ['before' => 'auth', 'uses' => 'HomeController@kick_user']);