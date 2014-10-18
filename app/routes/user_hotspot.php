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
