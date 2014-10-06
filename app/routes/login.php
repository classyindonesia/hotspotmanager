<?php
/* login */
Route::get('login', 'LoginController@index');
Route::post('check_login', 'LoginController@check_login');
Route::get('logout', 'LoginController@logout');