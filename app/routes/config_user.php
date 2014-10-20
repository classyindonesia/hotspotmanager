<?php
/* config user */
Route::get('config_user', ['before' => 'auth', 'uses' => 'ConfigUserController@index']);
Route::post('config_user/update', ['as' => 'config_user_update',  'before' => 'auth', 'uses' => 'ConfigUserController@update']);
