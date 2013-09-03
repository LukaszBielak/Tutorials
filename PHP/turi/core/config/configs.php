

<?php
//plik konfiguracji

if(!defined('DS')) define('DS', '/'); 

$AbsoluteURL = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] == 'on') ? 'https://' : 'http://'; 
$AbsoluteURL .= $_SERVER['HTTP_HOST'] . dirname($_SERVER['PHP_SELF']);
$slash = substr($AbsoluteURL, -1);
$NewURL = $slash != '/' ? $AbsoluteURL.'/' : $AbsoluteURL;

define('SERVER_ADDRESS', $NewURL);


/**
 * USTAWIENIA JĘZYKOWE
 */
 
$configs['default_session_var'] = 'lang'; 
$configs['default_lang'] = 'pl'; //domyślny język

/**
 * USTAWIENIA SYSTEMU - PODSTAWOWE
 */
 
$configs['default_controller'] = "home"; //domyślny kontroller

/**
 * USTAWIENIA SYSTEMU - ZAAWANSOWANE
 */

$configs['no_lang_action'] = "SET_ERROR_TEXT";	
$configs['no_lang_error_text'] = "Brak dostępnego tłumaczenia";
$configs['default_meta_tags_index'] = "default";
$configs['default_session_auth_var'] = 'login';
$configs['default_session_admin_auth_var'] = 'admin_login';
$configs['default_session_admin_priv_var'] = 'admin_priv';

/**
 * USTAWIENIA SYSTEMU - ŚCIEŻKI KATALOGÓW
 */
 
$configs['images_catalog_name'] = "images";  //nazwy katalogów
$configs['javascript_catalog_name'] = "js";
$configs['stylesheet_catalog_name'] = "css";
$configs['fonts_catalog_name'] = "fonts";

$configs['controller_path'] = "application".DS."kontrolery".DS; 
$configs['model_path'] = "application".DS."modele".DS;
$configs['view_path'] = "application".DS."widoki".DS;
$configs['media_path'] = "application".DS."media".DS;
$configs['module_path'] = "application".DS."sekcje".DS;

$configs['app_images_path'] = "application".DS."media".DS.$configs['images_catalog_name'].DS; 
$configs['app_javascript_path'] = "application".DS."media".DS.$configs['javascript_catalog_name'].DS;
$configs['app_stylesheet_path'] = "application".DS."media".DS.$configs['stylesheet_catalog_name'].DS;
$configs['app_fonts_path'] = "application".DS."media".DS.$configs['fonts_catalog_name'].DS;

$configs['helper_path'] = "core".DS."helpery".DS;  
$configs['library_path'] = "core".DS."biblioteki".DS;  
$configs['driver_path'] = "core".DS."db".DS; 
/**
 * USTAWIENIA SYSTEMU - BAZA DANYCH
 */

$configs['db_host'] = "mysql.cba.pl";
$configs['db_user'] = "interez0";
$configs['db_pass'] = "magnetic01";
$configs['db_name'] = "turicms_cba_pl";

/**
 * USTAWIENIA SYSTEMU - Administrator
 */

$configs['admin_name'] = "Łukasz";
$configs['admin_surname'] = "Bielak";
$configs['admin_login'] = "administrator";
$configs['admin_pass'] = "admin10"; 

?>