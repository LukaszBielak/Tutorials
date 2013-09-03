<?php
define("MODEL", true);

function model_load($model, $method = '', $params = Array())
{
	$model = singleton::getInstance($model);
	
	if(!empty($method))
	{
		$method = $model->$method($params);
	}
	
	return $method;
}

?>