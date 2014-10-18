<?php
/* home */
Route::get('config', ['before' => 'auth|admin', 'uses' => 'ConfigController@index']);
Route::post('config/update_variable', ['before' => 'auth|admin', 'uses' => 'ConfigController@update_variable']);

