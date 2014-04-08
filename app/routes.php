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


/* login */
Route::get('login', 'LoginController@index');
Route::post('check_login', 'LoginController@check_login');
Route::get('logout', 'LoginController@logout');


/* home */
Route::get('/', ['before' => 'auth', 'uses' => 'HomeController@index']);


/* user aktif */
Route::get('user_aktif', ['before' => 'auth', 'uses' => 'UseraktifController@index']);
Route::post('kick_user', ['before' => 'auth', 'uses' => 'UseraktifController@kick_user']);



/* profile */
Route::get('profile', ['before' => 'auth', 'uses' => 'ProfileController@index']);
Route::get('profile/add', ['before' => 'auth', 'uses' => 'ProfileController@add']);
