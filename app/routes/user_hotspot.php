<?php
/* home */
Route::get('user_hotspot', ['before' => 'auth', 'uses' => 'UserHotspotController@index']);