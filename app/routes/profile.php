<?php
/* profile */
Route::get('profile', ['before' => 'auth|admin', 'uses' => 'ProfileController@index']);
Route::get('profile/add', ['before' => 'auth|admin', 'uses' => 'ProfileController@add']);
Route::post('profile/submit_add', ['before' => 'auth|admin', 'uses' => 'ProfileController@submit_add']);
Route::post('profile/del', ['before' => 'auth|admin', 'uses' => 'ProfileController@del']);
Route::get('profile/view_atribut/{id}', ['before' => 'auth|admin', 'uses' => 'ProfileController@view_atribut']);
Route::get('profile/add_atribut/{id}', ['before' => 'auth|admin', 'uses' => 'ProfileController@add_atribut']);
Route::post('profile/submit_add_atribut', ['before' => 'auth|admin', 'uses' => 'ProfileController@submit_add_atribut']);
Route::post('profile/del_atribut', ['before' => 'auth|admin', 'uses' => 'ProfileController@del_atribut']);
Route::get('profile/edit_atribut/{id}/{id_atribut}', ['before' => 'auth|admin', 'uses' => 'ProfileController@edit_atribut']);
Route::post('profile/submit_update_atribut', ['before' => 'auth|admin', 'uses' => 'ProfileController@submit_update_atribut']);
