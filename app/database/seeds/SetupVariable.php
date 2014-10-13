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
 

		// Uncomment the below to run the seeder
		$f1 = Setup_Variable::where('variable', '=', 'alamat_email')->first();
		$f2 = Setup_Variable::where('variable', '=', 'website')->first();
		$f3 = Setup_Variable::where('variable', '=', 'nama_tempat')->first();
		$f4 = Setup_Variable::where('variable', '=', 'nama_tempat')->first();

 
		if(count($f1)<=0) DB::table('setup_variable')->insert($data1);
		if(count($f2)<=0) DB::table('setup_variable')->insert($data2);
		if(count($f3)<=0) DB::table('setup_variable')->insert($data3);
		if(count($f4)<=0) DB::table('setup_variable')->insert($data4);
 
 

	}

}
