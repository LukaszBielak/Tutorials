<?php

class logowaniemodel
{
	private $__config;
	private $__router;
    private $__params;
    private $__db;
	
	public function __construct()//rejestracja zmiennych
	{
		$this->__config = singleton::getInstance("config");
		$this->__router = singleton::getInstance("router");
        $this->__params = $this->__router->getParams();
        $this->__db = singleton::getInstance("db");
	}
	
	private function czyIstnieje($LOGIN, $PASSWORD)//sprawdza czy danych użytkownik istnieje w bazie
	{
		$query = $this->__db->execute("SELECT * FROM users WHERE username = '{$LOGIN}' AND password = '{$PASSWORD}' LIMIT 1");
		return $query;
	}
	
	private function zaloguj($LOGIN, $PASSWORD)//metoda logująca użytkownika w systemie
	{
		$PASSWORD = md5($PASSWORD);//kodowanie hasła
		
		if($this->czyIstnieje($LOGIN, $PASSWORD) && count($this->czyIstnieje($LOGIN, $PASSWORD)) > 0)//sprawdzamy czy nie jest pusta i zawiera jakiś element
		{
			$_SESSION[$this->__config->default_session_auth_var] = $LOGIN;//zapis do sesji, klucz sesyjny zapisujący nawe użytkownika
			return $LOGIN;
		}
		else
		{
			return false;
		}
	}
	
	public function login()//funkcja logująca userów
	{
		if(isset($this->__params['POST']['login']) && isset($this->__params['POST']['password']))//sprawdzamy czy zostało zdefiniowane login i hasło
		{
			if($this->zaloguj($this->__params['POST']['login'], $this->__params['POST']['password']))//sprawdzamy czy użytkownik istnieje
			{
				if(isset($_SERVER['HTTP_REFERER']) && !empty($_SERVER['HTTP_REFERER']))//sprawdzamy czy referer nie jest pusty
				{
					
					header("Location: ".$_SERVER['HTTP_REFERER']);//przekierownia na strone z której przyszliśmy, LOGOWANIE
				}
				else
				{
					header("Location: ".SERVER_ADDRESS."home/index");//jeżeli referer pusty to przekierowanie na strone indeksową
				}
				
			}
			else
			{
				die("Przekierowanie na stronę błędu");//w przypadku gdy nie bedziemy mogli kogoś zalogować
			}
		}
		else
		{
			if(isset($_SERVER['HTTP_REFERER']) && !empty($_SERVER['HTTP_REFERER']))
			{
				header("Location: ".$_SERVER['HTTP_REFERER']);
			}
			else
			{
				header("Location: ".SERVER_ADDRESS."home/index");
			}
		}
	}
}

?>