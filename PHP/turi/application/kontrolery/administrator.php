<?php 


class administrator extends controller
{
	public function __call($method, $args)
	{
		if(!is_callable($method))
		{
			$this->Exceptions->errorPage(404);
		}
	}
	
	public function main() { }
	
	public function index()
	{
		$this->model->administrator;
			
		$this->main->metatags_helper;
		$this->main->head_helper;
		$this->main->loader_helper;
		$this->main->module_helper;
		$this->main->model_helper;
		$this->main->directory_helper;
		$this->main->translate_helper;
	}
	

	public function dashboard()
	 {
		$this->model->administrator;
			
		$this->main->metatags_helper;
		$this->main->head_helper;
		$this->main->loader_helper;
		$this->main->module_helper;
		$this->main->model_helper;
		$this->main->directory_helper;
		$this->main->translate_helper;
	}
	
	public function management()
	{
		$this->model->administrator;
		
		$this->addSubpage(__FUNCTION__, "translationCreator");
		$this->addSubpage(__FUNCTION__, "translationEditor");
			
		$this->main->metatags_helper;
		$this->main->head_helper;
		$this->main->loader_helper;
		$this->main->module_helper;
		$this->main->model_helper;
		$this->main->directory_helper;
		$this->main->translate_helper;
	}
	
	public function my_pages()
	{
		$this->model->administrator;
		
		$this->addSubpage(__FUNCTION__, "controller");
		$this->addSubpage(__FUNCTION__, "method");
			
		$this->main->metatags_helper;
		$this->main->head_helper;
		$this->main->loader_helper;
		$this->main->module_helper;
		$this->main->model_helper;
		$this->main->directory_helper;
		$this->main->translate_helper;
	}

	
	public function user_pages()
	{
		$this->model->administrator;
		
		$this->addSubpage(__FUNCTION__, "edit");
			
		$this->main->metatags_helper;
		$this->main->head_helper;
		$this->main->loader_helper;
		$this->main->module_helper;
		$this->main->model_helper;
		$this->main->directory_helper;
		$this->main->translate_helper;
	}
	
	public function my_modules()
	{
		$this->model->administrator;
		
		$this->addSubpage(__FUNCTION__, "view");
			
		$this->main->metatags_helper;
		$this->main->head_helper;
		$this->main->loader_helper;
		$this->main->module_helper;
		$this->main->model_helper;
		$this->main->directory_helper;
		$this->main->translate_helper;
	}
	
	public function users()
	{
		$this->model->administrator;
		
		$this->addSubpage(__FUNCTION__, "view");
			
		$this->main->metatags_helper;
		$this->main->head_helper;
		$this->main->loader_helper;
		$this->main->module_helper;
		$this->main->model_helper;
		$this->main->directory_helper;
		$this->main->translate_helper;
	}
	
	public function wylogowanie()
	{
		$this->model->administrator->logout();
	}
	
	
	public function news()
		{
			$this->model->administrator;
			
			$this->addSubpage(__FUNCTION__, "view");
				
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
