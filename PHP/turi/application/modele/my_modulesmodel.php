<?php

class my_modulesmodel
{
    private $__config;
    private $__router;
    private $__db;
    private $__params;
	
	public function __construct()
    {
        $this->__config = singleton::getInstance("config");
        $this->__router = singleton::getInstance("router");
        $this->__db = singleton::getInstance("db");
        $this->__params = $this->__router->getParams();
	}
	
	public function drawModulesList()
	{
		$i = 0;
		$result = "<table class=\"text wideTable\" cellspacing=\"0\">\n
        <tr class=\"legend\">
            <td>Lp.</td>
            <td>Nazwa sekcji</td>
            <td>Opis</td>
            <td>Akcje</td>
        </tr>";
		
		$allModules = FilesystemUtil::getFiles($this->__config->module_path);
		
		if(!empty($allModules))
		{
			foreach($allModules as $module)
			{
				$fileCommDesc = ReflectionUtil::getFileCommentDescription($this->__config->module_path.$module."/".substr($module, 0, -7).".php", "ModuleDesc");//opis modułu
				$_fcd = (empty($fileCommDesc)) ? "Brak opisu" : $fileCommDesc[0];
				
				$result .= "<tr class=\"content\">
					<td>".++$i."</td>
					<td>$module</td>
					<td>$_fcd</td>
					<td><a class=\"subtle\" href=\"".SERVER_ADDRESS."administrator/my_modules/view/".substr($module, 0, -7)."\">Edycja sekcji</a> | <a class=\"subtle\" href=\"javascript:void(0);\" onClick=\"removeModule('".substr($module, 0, -7)."');\">Usuń sekcje</a></td>
				</tr>";
			}
			
			$result .= "</table>";
		}
		
		return $result;
		
	}
}

?>