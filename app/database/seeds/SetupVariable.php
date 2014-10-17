<?php

class SetupVariable extends Seeder {

	public function run(){
		//insert data di tabel mst_daftar_yudisium
		// Uncomment untuk membersihkan isi dlm tabel dan insert kembali ke default
		//DB::table('ref_user_level')->truncate();

		$data1 = ['variable' => 'alamat_email', 'value' => 'mandiga@man3kediri.sch.id'];
		$data2 = ['variable' => 'website', 'value' => 'www.man3kediri.sch.id'];
		$data3 = ['variable' => 'nama_tempat', 'value' => 'MAN 3 KEDIRI'];
		$data4 = ['variable' => 'alamat', 'value' => 'Jalan Letjend Soeprapto Nomor 58'];
 		$data5 = ['variable' => 'ip_radius_server', 'value' => '192.168.2.153'];
 		$data6 = ['variable' => 'password_root_radius', 'value' => 'kediri'];
 		$data7 = ['variable' => 'rad_secret_localhost', 'value' => 'rahasia123'];


		// Uncomment the below to run the seeder
		$f1 = Setup_Variable::where('variable', '=', 'alamat_email')->first();
		$f2 = Setup_Variable::where('variable', '=', 'website')->first();
		$f3 = Setup_Variable::where('variable', '=', 'nama_tempat')->first();
		$f4 = Setup_Variable::where('variable', '=', 'alamat')->first();
		$f5 = Setup_Variable::where('variable', '=', 'ip_radius_server')->first();
		$f6 = Setup_Variable::where('variable', '=', 'password_root_radius')->first();
		$f7 = Setup_Variable::where('variable', '=', 'rad_secret_localhost')->first();

 
		if(count($f1)<=0) DB::table('setup_variable')->insert($data1);
		if(count($f2)<=0) DB::table('setup_variable')->insert($data2);
		if(count($f3)<=0) DB::table('setup_variable')->insert($data3);
		if(count($f4)<=0) DB::table('setup_variable')->insert($data4);
		if(count($f5)<=0) DB::table('setup_variable')->insert($data5);
		if(count($f6)<=0) DB::table('setup_variable')->insert($data6);
		if(count($f7)<=0) DB::table('setup_variable')->insert($data7);
 
 

	}

}
