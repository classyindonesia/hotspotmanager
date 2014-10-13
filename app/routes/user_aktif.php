<?php
/* user aktif */
Route::get('user_aktif', ['before' => 'auth', 'uses' => 'UseraktifController@index']);
Route::post('kick_user', ['before' => 'auth', 'uses' => 'UseraktifController@kick_user']);