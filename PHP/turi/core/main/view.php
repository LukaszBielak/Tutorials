<?php

class view
{
	private $vars = Array();
	private $template;
	
	
	
	public function __get($var)
	{
		return sigleton::getInstance($var);
	}
	
	public function __set($key, $value)
	{
		$this->vars[$key] = $value; 
	}
	
	public function setTemplate($template) 
	{
		$this->template = $template;
	}
	
	public function getTemplate($controller = null)
	{
		return (empty($this->template)) ? $controller : $this->template; 
	}
	
	public function addExternalView($controller, $view = "index") 
	{
		$config = singleton::getInstance("config");
		$filepath = $config->view_path.$controller."/".$view.".php";
		
		if(file_exists($filepath)) include_once($filepath); 
	}
}

?>