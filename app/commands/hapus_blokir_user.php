<?php

use Illuminate\Console\Command;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Input\InputArgument;

class hapus_blokir_user extends Command {

	/**
	 * The console command name.
	 *
	 * @var string
	 */
	protected $name = 'hapus_blokir_user';

	/**
	 * The console command description.
	 *
	 * @var string
	 */
	protected $description = 'Mengaktifkan kembali user yg telah terblokir.';

 
	public function fire(){
		$username = $this->argument('user');
		//check user
		$radcheck = Radius_Radcheck::where('username', '=', $username)->first();
		if(count($radcheck)>0){
			//jika user ada, lanjut check atribut blokir
			$radcheck_blokir = Radius_Radcheck::where('username', '=', $username)
			->where('attribute', '=', 'Auth-Type')
			->where('value', '=', 'Reject')
			->first();
			if(count($radcheck_blokir)>0){
				//jika ada, maka hapus
	 			$radcheck_blokir->delete();

				//check apakah di radreply sudah ada pesan disabled
				$check_reply = Radius_Radreply::where('username', '=', $username)
				->where('attribute', '=', 'Reply-Message')
				->where('value', '=', 'your account has been disabled')
				->first();
	
				if(count($check_reply)>0){ //jika ada, maka hapus
			 		$check_reply->delete();
				}


			}
		}
		 $this->info('user : '.$username.' telah diaktifkan kembali!');
	}
 
	protected function getArguments()
	{
		return array(
			array('user', InputArgument::REQUIRED, 'Input user.'),
		);
	}
 

}
