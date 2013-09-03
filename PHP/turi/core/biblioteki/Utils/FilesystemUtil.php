<?php

class FilesystemUtil
{
	public static function getFiles($DIR)
	{
		$result = array_diff(scandir($DIR), array('..', '.'));
		$result = array_merge(Array(), $result); 
		
		return $result;
	}
	
	public static function getProperties($FILE)//odczytuje właściwośc pliku
	{
		$result['pathinfo'] 				= pathinfo($FILE);
		$result['size']['B'] 				= filesize($FILE);
		$result['size']['kB'] 				= round(filesize($FILE)/1024, 2);
		$result['size']['MB']               = round(filesize($FILE)/1024/1024, 2);
		$result['size']['GB']               = round(filesize($FILE)/1024/1024/1024, 2);
		$result['created']					= filectime($FILE);//czas utowrzenia
		$result['modified']					= filemtime($FILE);
		$result['owner']					= fileowner($FILE);
		$result['perms']					= fileperms($FILE);//uprawnienia do pliku
		$result['flags']['isReadable']		= is_readable($FILE);
		$result['flags']['isWriteable']     = is_writable($FILE);
        $result['flags']['isExecutable']    = is_executable($FILE);
		
		return $result;
	}
	
	public static function getFilesProperties($DIR)
	{
		$result = Array();
		$files = static::getFiles($DIR);
		
		if(!empty($files))
		{
			foreach($files as $file)
			{
				$result[] = array_merge(Array("filename" => $file), static::getProperties($DIR."/".$file));
			}
		}
		
		return $result;
	}
	
	public static function getSource($FILE, $INTOARRAY = FALSE)//funckja pobierająca zawartość plików
	{
		$result = "";
		
		if(!is_dir($FILE))
		{
			if($INTOARRAY)
			{
				$result = file($FILE);
			}
			else
			{
				$result = file_get_contents($FILE);
			}
		}
		
		return $result;
	}
	
	public static function saveFile($CONTENT, $FILENAME, $OVERWRITE = TRUE)//zapisuje modyfikacje w pliku
	{
		$result = false;
		
		if((file_exists($FILENAME) && $OVERWRITE) || (!file_exists($FILENAME)))
		{
			$put = file_put_contents($FILENAME, $CONTENT);
			$result = ($put === false) ? false : true;
		}
		
		return $result;
	}
	
	

	public static function _formatFileOwner($FILEOWNER)
	{
		
		echo get_current_user();
	}
	
}

?>