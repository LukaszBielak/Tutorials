<?php

//klasa odwzorowująca wzorzec sengleton

class singleton    
{
	private static $instance = array();  
	
	public static function getInstance($object, $params = false)  
	{
		if(empty(self::$instance[$object])) 
		{
			if(!$params) 
			{
				self::$instance[$object] = new $object();  
			}
			else
			{
				self::$instance[$object] = new $object($params); 
			}
		}
		
		return self::$instance[$object];
	}
}

?>