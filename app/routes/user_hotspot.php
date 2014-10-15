<?php
/* home */
Route::get('user_hotspot', ['before' => 'auth', 'uses' => 'UserHotspotController@index']);
Route::get('user_hotspot/add', ['before' => 'auth', 'uses' => 'UserHotspotController@add']);
Route::post('user_hotspot/insert', ['before' => 'auth', 'uses' => 'UserHotspotController@insert']);
Route::post('user_hotspot/del', ['before' => 'auth', 'uses' => 'UserHotspotController@del']);
Route::post('user_hotspot/test_radius', ['before' => 'auth', 'uses' => 'UserHotspotController@test_radius']);

