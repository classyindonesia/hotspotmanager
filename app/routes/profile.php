<?php
/* profile */
Route::get('profile', ['before' => 'auth|admin', 'uses' => 'ProfileController@index']);
Route::get('profile/add', ['before' => 'auth|admin', 'uses' => 'ProfileController@add']);
Route::post('profile/submit_add', ['before' => 'auth|admin', 'uses' => 'ProfileController@submit_add']);
Route::post('profile/del', ['before' => 'auth|admin', 'uses' => 'ProfileController@del']);
Route::post('profile/clear_user', ['before' => 'auth|admin', 'uses' => 'ProfileController@clear_user']);

/* atribut untuk radgroupreply */
Route::get('profile/view_atribut/{id}', ['as' => 'profile.view_atribut', 'before' => 'auth|admin', 'uses' => 'ProfileController@view_atribut']);
Route::get('profile/add_atribut/{id}', ['as' => 'profile.add_atribut', 'before' => 'auth|admin', 'uses' => 'ProfileController@add_atribut']);
Route::post('profile/submit_add_atribut', ['as' => 'profile.submit_add_atribut', 'before' => 'auth|admin', 'uses' => 'ProfileController@submit_add_atribut']);
Route::post('profile/del_atribut', ['as' => 'profile.del_atribut', 'before' => 'auth|admin', 'uses' => 'ProfileController@del_atribut']);
Route::get('profile/edit_atribut/{id}/{id_atribut}', ['as' => 'profile.edit_atribut', 'before' => 'auth|admin', 'uses' => 'ProfileController@edit_atribut']);
Route::post('profile/submit_update_atribut', ['as' => 'profile.submit_update_atribut', 'before' => 'auth|admin', 'uses' => 'ProfileController@submit_update_atribut']);


/* atribut untuk radgroupcheck */
Route::get('profile/view_check_atribut/{id}', ['as' => 'profile.view_check_atribut',  'before' => 'auth|admin', 'uses' => 'ProfileController@view_check_atribut']);
Route::get('profile/add_check_atribut/{id}', ['as' => 'profile.add_check_atribut', 'before' => 'auth|admin', 'uses' => 'ProfileController@add_check_atribut']);
Route::post('profile/submit_add_check_atribut', ['as' => 'profile.submit_add_check_atribut', 'before' => 'auth|admin', 'uses' => 'ProfileController@submit_add_check_atribut']);
Route::post('profile/del_check_atribut', ['as' => 'profile.del_check_atribut', 'before' => 'auth|admin', 'uses' => 'ProfileController@del_check_atribut']);
Route::get('profile/edit_check_atribut/{id}/{id_atribut}', ['as' => 'profile.edit_check_atribut', 'before' => 'auth|admin', 'uses' => 'ProfileController@edit_check_atribut']);
Route::post('profile/submit_update_check_atribut', ['as' => 'profile.submit_update_check_atribut', 'before' => 'auth|admin', 'uses' => 'ProfileController@submit_update_check_atribut']);
