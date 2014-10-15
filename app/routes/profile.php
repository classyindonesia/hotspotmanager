<?php
/* profile */
Route::get('profile', ['before' => 'auth', 'uses' => 'ProfileController@index']);
Route::get('profile/add', ['before' => 'auth', 'uses' => 'ProfileController@add']);
Route::post('profile/submit_add', ['before' => 'auth', 'uses' => 'ProfileController@submit_add']);
Route::post('profile/del', ['before' => 'auth', 'uses' => 'ProfileController@del']);
Route::get('profile/view_atribut/{id}', ['before' => 'auth', 'uses' => 'ProfileController@view_atribut']);
Route::get('profile/add_atribut/{id}', ['before' => 'auth', 'uses' => 'ProfileController@add_atribut']);
Route::post('profile/submit_add_atribut', ['before' => 'auth', 'uses' => 'ProfileController@submit_add_atribut']);
Route::post('profile/del_atribut', ['before' => 'auth', 'uses' => 'ProfileController@del_atribut']);
Route::get('profile/edit_atribut/{id}/{id_atribut}', ['before' => 'auth', 'uses' => 'ProfileController@edit_atribut']);
Route::post('profile/submit_update_atribut', ['before' => 'auth', 'uses' => 'ProfileController@submit_update_atribut']);
