<?php
//df
class Koncert_Beyonce_w_Warszawie extends controller
{
	public function __call($method, $args)
	{
		if(!is_callable($method))
		{
			$this->sgException->errorPage(404);			
        }
	}

	public function main()	{ }

	public function index()
	{
		$this->addHook($this->i18n->languageDetector(), 1);
		$this->main->metatags_helper;		
        $this->main->head_helper;
		$this->main->loader_helper;
		$this->main->module_helper;
		$this->main->model_helper;
		$this->main->directory_helper;
		$this->main->translate_helper;
		}

}

?>