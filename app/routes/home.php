<?php
/* home */
Route::get('/', ['before' => 'auth', 'uses' => 'HomeController@index']);