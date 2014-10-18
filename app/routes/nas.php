<?php
/* home */
Route::get('nas', ['before' => 'auth|admin', 'uses' => 'NasController@index']);
Route::get('nas/add', ['before' => 'auth|admin', 'uses' => 'NasController@add']);
Route::post('nas/insert', ['before' => 'auth|admin', 'uses' => 'NasController@insert']);
Route::post('nas/update', ['before' => 'auth|admin', 'uses' => 'NasController@update']);
Route::get('nas/edit/{id}', ['before' => 'auth|admin', 'uses' => 'NasController@edit']);
Route::post('nas/del', ['before' => 'auth|admin', 'uses' => 'NasController@del']);

Route::get('nas/mikrotik_resource/{id}', ['before' => 'auth|admin', 'uses' => 'NasController@mikrotik_resource']);
