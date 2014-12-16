<?php 
class Radius_Radacct extends Eloquent{

	 protected $guarded = array();
	 protected $table = 'radacct';
	 protected $connection = 'radius';
	 protected $primaryKey = 'radacctid';
	 public $timestamps = false;


	 public function nas(){
	 	return $this->belongsTo('Radius_Nas', 'nasipaddress', 'nasname');
	 }
 

 


}