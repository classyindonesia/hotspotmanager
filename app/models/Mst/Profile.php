<?php 
class Mst_Profile extends Eloquent{

	 protected $guarded = array();
	 protected $table = 'mst_profile';
 
 
 
	 public function radusergroup(){
	 	return $this->hasMany('Radius_Radusergroup', 'groupname', 'nama');
	 	//get value param1=class, param2=foreign_key, param3=local_key
	 }

	 public function atribut(){
	 	return $this->hasMany('Radius_Radgroupreply', 'groupname', 'nama');
	 }




 


}