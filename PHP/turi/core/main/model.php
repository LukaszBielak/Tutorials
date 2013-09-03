<?php

class model
{
	public function __get($model)
	{
		$config = singleton::getInstance("config");
		
		$_model = $model.'model';
		$modelfile = $config->model_path.$_model.".php"; 
		
		if(!file_exists($modelfile))
		{
			$modelfile = "core/models/nullmodel.php"; 
			$_model = "nullmodel";
		}
		
		include_once($modelfile); 
		
		$modelobj = singleton::getInstance($_model); 
		
		return $modelobj;
	}
}

?>