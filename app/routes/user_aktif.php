<?php
/* user aktif */
Route::get('user_aktif', ['before' => 'auth|admin', 'uses' => 'UseraktifController@index']);
Route::post('kick_user', ['before' => 'auth|admin', 'uses' => 'UseraktifController@kick_user']);
Route::post('update_time_refresh', ['as' => 'user_aktif_update_time_refresh', 'before' => 'auth|admin', 'uses' => 'UseraktifController@update_time_refresh']);