<?php 
class Mst_obrolan extends Eloquent{

	 protected $guarded = array();
	 protected $table = 'mst_obrolan';
  

  public function data_user(){
  	return $this->belongsTo('Mst_Data_User', 'username', 'username');
  }

}