<?php
define("MODULE", true);

function module_load($module){//funkcja wczytująca moduł
	$config = singleton::getInstance("config");
	$module = strtolower($module);
	$module_path = $config->module_path.$module.'_module'."/";
	
	if(!file_exists($module_path.$module.'.php'))
	{
		return "<script type=\"text/javascript\">alert(\"UWAGA!\\nNie znaleziono plików modułu '".$module."'\");</script>"; //alert javascriptowy
	}
	
	include_once($module_path.$module.'.php'); //właczenie pliow modułu aby były wykonane w systemi
	return ;
}

?>