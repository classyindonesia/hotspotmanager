<?php 
class Radius_Radcheck extends Eloquent{

	 protected $guarded = array();
	 protected $table = 'radcheck';
	 protected $connection = 'radius';
	 public $timestamps = false;


	 public function radusergroup(){
	 	return $this->hasOne('Radius_Radusergroup', 'username', 'username');
	 	//get value param1=class, param2=foreign_key, param3=local_key
	 }

 


}