<?php
/* home */
Route::get('config', ['before' => 'auth', 'uses' => 'ConfigController@index']);
Route::post('config/update_variable', ['before' => 'auth', 'uses' => 'ConfigController@update_variable']);

