<?php
define("METATAGS", true);

function add_metatags($name = "")
{
	$_meta = singleton::getInstance("metatags", $name);
	
	if($res)
	{
		$_res = "";
		unset($res[0]['id'], $res[0]['meta_tags_id'], $res[0]['name']);
		foreach($res[0] as $key => $val)//pętla
		{
			if(strtoupper($key) == "CONTENT_TYPE")
			{
				$_res .= "<meta http-equiv=\"content-type\" content=\"text/html; charset=".$val."\" />\n";
			}
			else 
			{
				$_res .= "<meta name=\"".str_replace("_", "-", $key)."\" content=\"".$val."\" />\n";
			}
		}
		
		return $_res;
	}
	
	return ;
}

?>