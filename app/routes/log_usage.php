<?php

/* log usage */
Route::get('log_usage', ['as' => 'log_usage_home',  'before' => 'auth', 'uses' => 'LogUsageController@index']);
 