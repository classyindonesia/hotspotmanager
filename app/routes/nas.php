<?php
/* home */
Route::get('nas', ['before' => 'auth', 'uses' => 'NasController@index']);
Route::get('nas/add', ['before' => 'auth', 'uses' => 'NasController@add']);
Route::post('nas/insert', ['before' => 'auth', 'uses' => 'NasController@insert']);
Route::post('nas/update', ['before' => 'auth', 'uses' => 'NasController@update']);
Route::get('nas/edit/{id}', ['before' => 'auth', 'uses' => 'NasController@edit']);
Route::post('nas/del', ['before' => 'auth', 'uses' => 'NasController@del']);

Route::get('nas/mikrotik_resource/{id}', ['before' => 'auth', 'uses' => 'NasController@mikrotik_resource']);
