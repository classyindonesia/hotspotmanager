<?php
/* home */
Route::get('user_hotspot', ['before' => 'auth|admin', 'uses' => 'UserHotspotController@index']);
Route::get('user_hotspot/add', ['before' => 'auth|admin', 'uses' => 'UserHotspotController@add']);
Route::post('user_hotspot/insert', ['before' => 'auth|admin', 'uses' => 'UserHotspotController@insert']);
Route::post('user_hotspot/del', ['before' => 'auth|admin', 'uses' => 'UserHotspotController@del']);
Route::post('user_hotspot/test_radius', ['before' => 'auth|admin', 'uses' => 'UserHotspotController@test_radius']);

Route::get('user_hotspot/import', ['as' => 'user_hotspot_import','before' => 'auth|admin', 'uses' => 'UserHotspotController@import']);
Route::post('user_hotspot/do_import', ['as' => 'user_hotspot_do_import', 'before' => 'auth|admin', 'uses' => 'UserHotspotController@do_import']);
Route::post('user_hotspot/submit_search', ['as' => 'user_hotspot_search', 'before' => 'auth|admin', 'uses' => 'UserHotspotController@submit_search']);
Route::get('user_hotspot/view_detail/{id}', ['as' => 'user_hotspot.view_detail','before' => 'auth|admin', 'uses' => 'UserHotspotController@view_detail']);

//reply attributes
Route::get('user_hotspot/view_attributes/{username}', ['as' => 'user_hotspot.view_attributes','before' => 'auth|admin', 'uses' => 'UserHotspotController@view_attributes']);
Route::get('user_hotspot/add_user_attributes/{username}', ['as' => 'user_hotspot.add_user_attributes','before' => 'auth|admin', 'uses' => 'UserHotspotController@add_user_attributes']);
Route::post('user_hotspot/insert_user_attributes', ['as' => 'insert_user_attributes', 'before' => 'auth|admin', 'uses' => 'UserHotspotController@insert_user_attributes']);
Route::post('user_hotspot/del_user_attributes', ['as' => 'del_user_attributes', 'before' => 'auth|admin', 'uses' => 'UserHotspotController@del_user_attributes']);
Route::get('user_hotspot/edit_user_attributes/{username}/{id}', ['as' => 'user_hotspot.edit_user_attributes','before' => 'auth|admin', 'uses' => 'UserHotspotController@edit_user_attributes']);
Route::post('user_hotspot/update_user_attributes', ['as' => 'update_user_attributes', 'before' => 'auth|admin', 'uses' => 'UserHotspotController@update_user_attributes']);


//check attributes
Route::get('user_hotspot/view_check_attributes/{username}', ['as' => 'user_hotspot.view_check_attributes','before' => 'auth|admin', 'uses' => 'UserHotspotController@view_check_attributes']);
Route::get('user_hotspot/add_user_check_attributes/{username}', ['as' => 'user_hotspot.add_user_check_attributes','before' => 'auth|admin', 'uses' => 'UserHotspotController@add_user_check_attributes']);
Route::post('user_hotspot/insert_user_check_attributes', ['as' => 'insert_user_check_attributes', 'before' => 'auth|admin', 'uses' => 'UserHotspotController@insert_user_check_attributes']);
Route::post('user_hotspot/del_user_check_attributes', ['as' => 'del_user_check_attributes', 'before' => 'auth|admin', 'uses' => 'UserHotspotController@del_user_check_attributes']);
Route::get('user_hotspot/edit_user_check_attributes/{username}/{id}', ['as' => 'user_hotspot.edit_user_check_attributes','before' => 'auth|admin', 'uses' => 'UserHotspotController@edit_user_check_attributes']);
Route::post('user_hotspot/update_user_check_attributes', ['as' => 'update_user_check_attributes', 'before' => 'auth|admin', 'uses' => 'UserHotspotController@update_user_check_attributes']);


/* pemblokiran user */
Route::get('user_hotspot/import_blokir', ['as' => 'user_hotspot.import_blokir','before' => 'auth|admin', 'uses' => 'UserHotspotController@import_blokir']);
Route::get('user_hotspot/import_hapus_blokir', ['as' => 'user_hotspot.import_hapus_blokir','before' => 'auth|admin', 'uses' => 'UserHotspotController@import_hapus_blokir']);
Route::post('user_hotspot/do_import_blokir', ['as' => 'user_hotspot.do_import_blokir','before' => 'auth|admin', 'uses' => 'UserHotspotController@do_import_blokir']);
Route::post('user_hotspot/do_import_hapus_blokir', ['as' => 'user_hotspot.do_import_hapus_blokir','before' => 'auth|admin', 'uses' => 'UserHotspotController@do_import_hapus_blokir']);

