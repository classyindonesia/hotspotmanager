<?php

use Illuminate\Console\Command;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Input\InputArgument;

class blokir_user extends Command {

	/**
	 * The console command name.
	 *
	 * @var string
	 */
	protected $name = 'blokir_user';

	/**
	 * The console command description.
	 *
	 * @var string
	 */
	protected $description = 'memblokir user';

 
	public function fire()
	{
		$username = $this->argument('user');
		//check user
		$radcheck = Radius_Radcheck::where('username', '=', $username)->first();
		if(count($radcheck)>0){
			//jika user ada, lanjut check atribut blokir
			$radcheck_blokir = Radius_Radcheck::where('username', '=', $username)
			->where('attribute', '=', 'Auth-Type')
			->where('value', '=', 'Reject')
			->first();
			if(count($radcheck_blokir)<=0){
				//jika blm ada, maka insert
				$data = [
					'username' => $username, 
					'attribute' => 'Auth-Type',
					'op'		=> ':=',
					'value'		=> 'Reject'
					];
					Radius_Radcheck::create($data);

				//check apakah di radreply sudah ada pesan disabled
				$check_reply = Radius_Radreply::where('username', '=', $username)
				->where('attribute', '=', 'Reply-Message')
				->where('value', '=', 'your account has been disabled')
				->first();
	
				if(count($check_reply)<=0){ //jika blm ada, maka insert pesan tsb
					$data_reply = [
					'username' => $username, 
					'attribute' => 'Reply-Message',
					'op'		=> '=',
					'value'		=> 'your account has been disabled',
					];
					Radius_Radreply::create($data_reply);

				}


			}
		}
		//$this->info('user : '.$value);
	}

	/**
	 * Get the console command arguments.
	 *
	 * @return array
	 */
	protected function getArguments()
	{
		return array(
			array('user', InputArgument::REQUIRED, 'Input User'),
		);
	}

 

}
