<?php

class my_modules_viewmodel
{
    private $__config;
    private $__router;
    private $__db;
    private $__params;
    private $__objectInfo;
	
	public function __construct()
    {
        $this->__config = singleton::getInstance("config");
        $this->__router = singleton::getInstance("router");
        $this->__db = singleton::getInstance("db");
        $this->__params = $this->__router->getParams();
        
        $_errObject = singleton::getInstance("Exceptions");
		
		if(!isset($this->__params[1])) $_errObject->errorPage(404);
		if(!$this->_validateModule($this->__params[1])) $_errObject->errorPage(404);
    }
	
	private function _validateModule($module)//validuje nazwe modułu
	{
		if(!file_exists($this->__config->module_path.$module."_module/".$module.".php"))//sprawdzenie czy istnieje plik z katalogiem
		{
			return false;
		}
		
		return true;
	}
	
	public function getModuleName()//nazwa moduły
	{
		return $this->__params[1];
	}
	
	public function getModuleEditor()//textarea edytora dla moduły
	{
		$result = '<textarea name="moduleEditor" id="moduleEditor">'.FilesystemUtil::getSource($this->__config->module_path.$this->getModuleName()."_module/".$this->getModuleName().".php").'</textarea>';
		return $result;
	}
	
	
	
}

?>