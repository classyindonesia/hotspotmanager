<?php


use Illuminate\Console\Command;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Input\InputArgument;
use Ifsnop\Mysqldump as IMysqldump;

class backupdb_to_email extends Command {

	/**
	 * The console command name.
	 *
	 * @var string
	 */
	protected $name = 'backupdb_to_email';
 
	protected $description = 'Backup database ke email';

 
	public function __construct()
	{
		parent::__construct();
	}

 
	public function fire()
	{
		 
		$this->info('Dumping database...');

		// backup database radius
		try {
			$dbuser = getenv('DB_USERNAME');
			$dbpassword = getenv('DB_PASSWORD');
			$dbname = getenv('DB_NAME');
			$dbhost = getenv('DB_HOST');
		    $dump = new IMysqldump\Mysqldump($dbname, $dbuser, $dbpassword, $dbhost, 'mysql', ['compress' => 'Gzip']);
		    $path = storage_path('cache/backup_radius_'.date('Y-m-d').'.sql');
		    $dump->start($path);
		    $this->info('Sukses Backup DB1!');
		    //$this->info('File saved to : '.$path);
 
		} catch (\Exception $e) {
		    $this->error('Import failed with message : ' . $e->getMessage());
		}



		//backup database radius2
		try {
			$dbuser = getenv('DB_RADIUS_USERNAME');
			$dbpassword = getenv('DB_RADIUS_PASSWORD');
			$dbname = getenv('DB_RADIUS_NAME');
			$dbhost = getenv('DB_RADIUS_HOST');
		    $dump = new IMysqldump\Mysqldump($dbname, $dbuser, $dbpassword, $dbhost, 'mysql', ['compress' => 'Gzip']);
		    $path = storage_path('cache/backup_radius2_'.date('Y-m-d').'.sql');
		    $dump->start($path);
		    $this->info('Sukses Backup DB2!');
		    //$this->info('File saved to : '.$path);
		} catch (\Exception $e) {
		    $this->error('Import failed with message : ' . $e->getMessage());
		}

 
 		$this->info('sending files to your email backup...');

			Mail::send('emails.backup_database', array('key' => 'value'), function($message){
 			    $message->to(getenv('MAIL_BACKUP_DB_USERNAME'))
			    ->subject('Backup Database HSMAN, '.Fungsi::date_to_tgl(date('Y-m-d')) );
			    $message->attach(storage_path('cache/backup_radius_'.date('Y-m-d').'.sql.gz'));
			    $message->attach(storage_path('cache/backup_radius2_'.date('Y-m-d').'.sql.gz'));
			});

			$file_db1 = storage_path('cache/backup_radius_'.date('Y-m-d').'.sql.gz');
			if(file_exists($file_db1)){
				unlink($file_db1);
			}
			$file_db2 = storage_path('cache/backup_radius2_'.date('Y-m-d').'.sql.gz');
			if(file_exists($file_db2)){
				unlink($file_db2);
			}
			
			$this->info('done!');

	}

 /*
	protected function getArguments()
	{
		return array(
			array('example', InputArgument::REQUIRED, 'An example argument.'),
		);
	}


 
	protected function getOptions()
	{
		return array(
			array('example', null, InputOption::VALUE_OPTIONAL, 'An example option.', null),
		);
	}
*/

}
