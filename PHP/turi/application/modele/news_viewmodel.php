<?php

class news_viewmodel
{
    private $__config;
    private $__router;
    private $__db;
    private $__params;
	private $__newArticle = true;
    
    public function __construct()
    {
        $this->__config = singleton::getInstance("config");
        $this->__router = singleton::getInstance("router");
        $this->__db = singleton::getInstance("db");
        $this->__params = $this->__router->getParams();
		
		if(isset($this->__params[1]) && !empty($this->__params[1])) $this->__newArticle = false;
	}
	
	public function __call($method, $params)
	{
		if(substr($method, 0, 3) == "get")
		{
			if($this->__newArticle)
			{
				return "";
			}
			else
			{
				$method = substr(strtolower($method), 3);
				$articles = $this->__db->execute("SELECT $method FROM articles WHERE id = '{$this->__params[1]}'");
				return (!empty($articles)) ? $articles[0][$method] : "";
			}
		}
	}
}

?>