<?php
//parser metatagów

class metatags
{
	private $_config;
    private $_router;
    private $_db;
    private $__view;
	
	public function __construct($name = "")
	{
		$this->_config = singleton::getInstance("config");//rejestrowanie config, router oraz baze danych
        $this->_router = singleton::getInstance("router");
        $this->_db = singleton::getInstance("db");
		
		$this->__view = (empty($name)) ? $this->_config->default_meta_tags_index : $name;
	}
	
	public function _load()//metoda wczytujaca z bazy danych
	{
		$query = "SELECT * FROM meta_tags, meta_tags_index WHERE meta_tags.id = meta_tags_index.meta_tags_id AND meta_tags_index.name = '{$this->__view}'";
		$query = $this->_db->execute($query);
		
		return $query;
	}
}

?>