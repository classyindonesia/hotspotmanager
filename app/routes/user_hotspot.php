<?php
/* home */
Route::get('user_hotspot', ['before' => 'auth', 'uses' => 'UserHotspotController@index']);
Route::get('user_hotspot/add', ['before' => 'auth', 'uses' => 'UserHotspotController@add']);
Route::post('user_hotspot/insert', ['before' => 'auth', 'uses' => 'UserHotspotController@insert']);