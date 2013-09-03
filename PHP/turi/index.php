<?php
 if(file_exists('install') && is_dir('install'))
 {
 	header( "Location: install/install.php");
 }
 else 
 {
	ob_start();

	require_once("core/init.php");					

	$router = singleton::getInstance("router"); 
	dispatcher::dispatch($router); 


	ob_end_flush();
 }


?>