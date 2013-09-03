<?php

class users_viewmodel
{
    private $__config;
    private $__router;
    private $__db;
    private $__params;
   private $__newUsers = true;
    
    public function __construct()
    {
        $this->__config = singleton::getInstance("config");
        $this->__router = singleton::getInstance("router");
        $this->__db = singleton::getInstance("db");
        $this->__params = $this->__router->getParams();
      
      if(isset($this->__params[1]) && !empty($this->__params[1])) $this->__newUsers = false;
   }
   
   public function __call($method, $params)
   {
      if(substr($method, 0, 3) == "get")
      {
         if($this->__newUsers)
         {
            return "";
         }
         else
         {
            $method = substr(strtolower($method), 3);
            $users = $this->__db->execute("SELECT $method FROM users WHERE id = '{$this->__params[1]}'");
            return (!empty($users)) ? $users[0][$method] : "";
         }
      }
   }
}

?>
