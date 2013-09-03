<?php



error_reporting(E_ALL); 

if(!isset($_SESSION)) session_start(); 

set_include_path(get_include_path() . PATH_SEPARATOR . 'core/main');  
set_include_path(get_include_path() . PATH_SEPARATOR . 'core/db');
set_include_path(get_include_path() . PATH_SEPARATOR . 'core/helpery');
set_include_path(get_include_path() . PATH_SEPARATOR . 'core/biblioteki');
set_include_path(get_include_path() . PATH_SEPARATOR . 'core/biblioteki/Utils');
set_include_path(get_include_path() . PATH_SEPARATOR . 'core/interfaces');
set_include_path(get_include_path() . PATH_SEPARATOR . 'core/i18n');
set_include_path(get_include_path() . PATH_SEPARATOR . 'core/bledy');
set_include_path(get_include_path() . PATH_SEPARATOR . 'core/modele');
set_include_path(get_include_path() . PATH_SEPARATOR . 'application/kontrolery');
set_include_path(get_include_path() . PATH_SEPARATOR . 'application/modele');
set_include_path(get_include_path() . PATH_SEPARATOR . 'application/widoki');

function __autoload($name) 
{
	include_once($name.".php");
}

?>