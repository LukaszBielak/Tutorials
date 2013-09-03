<?php
define("DIRECTORY", true);

function directory_map($source_dir, $directory_depth = 0, $hidden = false, $sort = false)

{
	if($fp = @opendir($source_dir)) 
	{
		$filedata = Array();
		$new_depth = $directory_depth - 1; 
		$source_dir = rtrim($source_dir, DIRECTORY_SEPARATOR).DIRECTORY_SEPARATOR;
		
		while(($file = readdir($fp)) !== FALSE) 
		{
			if(!trim($file, '.') || ($hidden == false && $file[0] == '.'))
			{
				continue;
			}
			
			if(($directory_depth < 1 || $new_depth > 0) && @is_dir($source_dir.$file))
			{
				$filedata[$file] = directory_map($source_dir.$file.DIRECTORY_SEPARATOR, $new_depth, $hidden);
			}
			else
			{
				$filedata[] = $file; 
			}
		}
		
		closedir($fp);
		if($sort !== false) sort($filedata);
		return $filedata;
	}
	
	return false;
}

function directory_images()//funkcja zwracająca katalog z obrazkami
{
	$config = singleton::getInstance("config");
	return $config->app_images_path;//zwrócenie ściezki do obrazków
}

function directory_javascript()//funkcja zwracająca katalog z javascriptem
{
	$config = singleton::getInstance("config");
	return $config->app_javascript_path;
}

function directory_stylesheet()//funkcja zwracająca katalog z stylesheet
{
	$config = singleton::getInstance("config");
	return $config->app_stylesheet_path;
}

function directory_fonts()//funkcja zwracająca katalog z czcionkami
{
	$config = singleton::getInstance("config");
	return $config->app_fonts_path;
}

?>