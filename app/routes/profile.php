<?php
/* profile */
Route::get('profile', ['before' => 'auth', 'uses' => 'ProfileController@index']);
Route::get('profile/add', ['before' => 'auth', 'uses' => 'ProfileController@add']);
Route::post('profile/submit_add', ['before' => 'auth', 'uses' => 'ProfileController@submit_add']);
Route::post('profile/del', ['before' => 'auth', 'uses' => 'ProfileController@del']);