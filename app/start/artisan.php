<?php

/*
|--------------------------------------------------------------------------
| Register The Artisan Commands
|--------------------------------------------------------------------------
|
| Each available Artisan command must be registered with the console so
| that it is available to be called. We'll register every command so
| the console gets access to each of the command object instances.
|
*/

/* command tambahan */
//Artisan::add(new migrasi_template); 
Artisan::add(new Matrix); 
Artisan::add(new blokir_user); 
Artisan::add(new hapus_blokir_user); 
Artisan::add(new backupdb_to_email); 
 