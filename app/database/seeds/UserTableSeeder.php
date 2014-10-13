<?php

class UserTableSeeder extends Seeder {

	public function run(){
		//insert data di tabel mst_daftar_yudisium
		// Uncomment untuk membersihkan isi dlm tabel dan insert kembali ke default
		DB::table('ref_user_level')->truncate();

		$data1 = ['id' => 1, 'nama' => 'admin'];
		$data2 = ['id' => 2, 'nama' => 'user'];
 

		// Uncomment the below to run the seeder
		$f1 = Ref_User_Level::find(1);
		$f2 = Ref_User_Level::find(2);
 
		if(count($f1)<=0) DB::table('ref_user_level')->insert($data1);
		if(count($f2)<=0) DB::table('ref_user_level')->insert($data2);
 
 

	}

}
