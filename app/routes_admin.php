<?php





Route::group(array('before' => 'auth',  'prefix'=>'admin'),function(){
    Route::get('dashboard',function(){
	       
    	return 'mantab';
   });

    Route::get('/',function(){
	       
    	return 'index admin';
   });


   //.......
});