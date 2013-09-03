<?php
define("LOADER", true);

function stylesheet_load($files)// funkcja wczytująca tyle css, files to pliki css'a
{
	if(isset($files))
	{
		$echo = "";//pusty aby potem dopisać do niej elementy
		$files = explode(",", $files);//rozdzielenie zawartośći po przecinku i dopisanie do niej samej
		
		foreach($files as $file)
		{
			$file = trim($file);
			
			$echo .= "<link rel=\"stylesheet\" type=\"text/css\" href=\"application/media/css/".$file."\" />\n";//dopianie do echo
		}
		
		return $echo;//zwrócenie echo
	}
	
	return 'Nie podano nazw arkuszy styli!';
}

function javascript_load($files)//funkcja wczytujaca pliki javascript
{
	if(isset($files))
	{
		$echo = "";
		$files = explode(",", $files);
		
		foreach($files as $file)
		{
			$file = trim($file);
			
			$echo .= "<script type=\"text/javascript\" src=\"application/media/js/".$file."\"></script>\n";
		}
		
		return $echo;
	}
	
	return 'Nie podano nazw plików JavaScript!';
}

function add_javascript($file)//fukcja dodająca w dowolnym miejscu w kodzie pliku javascript
{
	$res = "";
	
	if(file_exists($file)) $res = "<script type=\"text/javascript\">\n".file_get_contents($file)."\n</script>";//zawartośc $file(file_get_contents)
	
	return $res;
}

?>