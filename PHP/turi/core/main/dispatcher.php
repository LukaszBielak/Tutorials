<?php

class dispatcher
{
	public static function dispatch($router)
	{
		ob_start();
		$config = singleton::getInstance("config");
		$Exceptions = singleton::getInstance("Exceptions");
		
		if($router instanceof router)
		{
			$controller     = $router->getController();
            $action         = $router->getAction();
            $params         = $router->getParams();
		}
		else
		{
			$Exceptions->throwException("Router nie został znaleziony lub nie jest instancją tej klasy.");
		}
		
		$controllerfile = $config->controller_path.$controller.".php"; 
		
		if(!file_exists($controllerfile)) 
		{
			$Exceptions->throwException("Kontroler '".$controller."' nie został znaleziony w systemie!");
		}
		
		include_once($controllerfile);
		$sys = new $controller($params); 
		$sys->$action(); 
		ob_start(); 
		
		$view = singleton::getInstance("view");
		
		if(!empty($sys->template)) $view->setTemplate($sys->template);
		
		$template = $view->getTemplate($action);
		
		main::_templateLoader($controller, $template); 
		
	}
}

?>