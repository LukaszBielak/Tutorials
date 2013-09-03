<?php

class homemodel
{
	private $config;
	private $db;
	private $controller;
	private $router;
	
	public function __construct()//konstruktor rejestrucjący klase konfig
	{
		$this->config = singleton::getInstance("config");
		$this->db = singleton::getInstance("db");
		$this->router = singleton::getInstance("router");
		$this->controller = $this->router->getController();
	}
	
	public function getLoginPanelTitle()//metoda zmieniająca tytuł panelu logowania
	{//jeżeli warunek jest prawda to wyśiwetlamy to login(czy to co zwraca default session auth var jeżeli nie wyswietla "panel logowania").W kluczu login przechowywana jest wartośc nazwy użytkownika
		return (isset($_SESSION[$this->config->default_session_auth_var]) && !empty($_SESSION[$this->config->default_session_auth_var])) ? $_SESSION[$this->config->default_session_auth_var] : "Panel logowania";
	}
	
	public function addLogoutBtn()//dodawanie przycisku do menu
	{
		return (isset($_SESSION[$this->config->default_session_auth_var]) && !empty($_SESSION[$this->config->default_session_auth_var])) ? "<li><a id=\"logged\" href=\"wylogowanie/index\">Wyloguj</a></li>" : "";
	}
	public function logout()
	{
		
		if(isset($_SESSION[$this->config->default_session_auth_var]) && $_SESSION['lang'] == 'pl')
		{
			echo'<a href="wylogowanie"><img src="application/media/images/wyloguj.jpg" alt="wyloguj" /></a>';
		}
		elseif(isset($_SESSION[$this->config->default_session_auth_var]) && $_SESSION['lang'] != 'pl')
		{
			echo'<a href="wylogowanie"><img src="application/media/images/logout.jpg" alt="wyloguj" /></a>';
		}
		else 
		{
			echo "";	
		}
	}
	
	public function eventList()
	{
		
		if(isset($_SESSION[$this->config->default_session_auth_var]) && $_SESSION['lang'] == 'pl')
		{
			echo'<a href="#eventlist"><img src="application/media/images/about.jpg" alt="eventlist" /></a>';
		}
		elseif(isset($_SESSION[$this->config->default_session_auth_var]) && $_SESSION['lang'] != 'pl') 
		{
			echo'<a href="#eventlist"><img src="application/media/images/about2.jpg" alt="eventlist" /></a>';
		}
		else 
		{
			echo "";	
		}
	}
	
	public function drawUserEventsList()
	{	
		$events = $this->db->execute("SELECT event, user FROM user_events WHERE user = '{$_SESSION['login']}'");
		$result = "";
		
		if(!empty($events))
				{
					foreach($events as $event)
					{
						$result .= "<li><a href='{$event['event']}'>".str_replace('_',' ',$event['event'])."</a>";
					}		
				}
		
			return $result;
	}

	public function drawCitiesList()
	{
		$result="";
		$cities = $this->db->execute("SELECT name, path FROM images LIMIT 5");
		$count = count($cities);
		if(!empty($cities))
				{
					$i = 0;
					foreach($cities as $city)
					{
						$i++;					
						if($i % 3 == 0)
						{
						$result .= "<a href='news/index?miasto={$city['name']}' class='no_mr'><img src='{$city['path']}' alt='newsy' width='152' height='152' /></a>";
						}
						else 
						{
						$result .= "<a href='news/index?miasto={$city['name']}'><img src='{$city['path']}' alt='newsy' width='152' height='152' /></a>";
						}
					}
						$result .= "<a href='news/index' class='no_mr'><img src='kfm-1.4.7/uploads/Polska.jpg' alt='newsy' width='152' height='152' /></a>";
						
					
				}
		

			return $result;
	}
	
	public function contact()
	{
		if($_SESSION['lang'] == 'pl')
		{
			echo'<a href="#contact"><img src="application/media/images/contact.jpg" alt="Contact" /></a>';
		}
		elseif($_SESSION['lang'] != 'pl')
		{
			echo'<a href="#contact"><img src="application/media/images/contact2.jpg" alt="Contact" /></a>';
		}
		else 
		{
			echo'<a href="#contact"><img src="application/media/images/contact.jpg" alt="Contact" /></a>';	
		}
	}
	
}

?>