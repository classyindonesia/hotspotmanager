<?php

/* log usage */
Route::get('obrolan', ['as' => 'obrolan_home',  'before' => 'auth', 'uses' => 'ObrolanController@index']);
Route::post('obrolan/insert', ['as' => 'obrolan_insert',  'before' => 'auth', 'uses' => 'ObrolanController@insert']);
Route::get('obrolan/show/{id}', ['as' => 'obrolan_show',  'before' => 'auth', 'uses' => 'ObrolanController@show']);
