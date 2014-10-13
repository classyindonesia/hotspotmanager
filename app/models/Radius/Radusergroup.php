<?php 
class Radius_Radusergroup extends Eloquent{

	 protected $guarded = array();
	 protected $table = 'radusergroup';
	 public $incrementing = false;
	 protected $primaryKey = 'username';
	 protected $connection = 'radius';
	 public $timestamps = false;

 


}