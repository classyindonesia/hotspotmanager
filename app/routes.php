<?php
require __DIR__.'/routes/home.php'; 
require __DIR__.'/routes/login.php'; 
require __DIR__.'/routes/profile.php'; 
require __DIR__.'/routes/user_aktif.php'; 
require __DIR__.'/routes/user_hotspot.php'; 
require __DIR__.'/routes/config.php'; 
 

if (Request::is('admin/*') || Request::is('admin')){
    
    require __DIR__.'/routes_admin.php'; 
}

















