<?php

class my_pagesmodel
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
	

	
	
	public function listaStronSystemu()//funkcja rysująca tabeli ze stronami i ich właściwościami
	{
		$info = $this->_getAllClassMethods();
			
		$res = "<table class=\"text wideTable\" cellspacing=\"0\">\n
		<tbody>
        <tr class=\"legend\">
            <td style=\"min-width: 30px!important\">ID</td>
            <td>Nazwa strony</td>
            <td>Funkcje</td>
        </tr>";
		
		$i = 0;
		foreach($info as $key => $val)
		{
			$i++;
			$fprop = FilesystemUtil::getProperties($this->__config->controller_path.$key.".php");
		
						$res .= "<tr class=\"content\">
							<td style=\"min-width: 30px!important\">{$i}</td>
							<td>{$fprop['pathinfo']['filename']}</td>
							<td><a class=\"subtle\" href=\"".SERVER_ADDRESS."administrator/my_pages/controller/".$key."\">WŁAŚCIWOŚCI</a> | <a class=\"subtle\" href=\"javascript:void(0);\" onclick=\"removePage('".$key."');\">SKASUJ</a></td>						
							</tr>";
		}
		
			$res .= "</tbody></table>";
			return $res;
	}
		

			
						
}

	
?>