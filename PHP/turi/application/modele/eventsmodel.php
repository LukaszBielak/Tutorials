<?php

class eventsmodel
{
    private $__config;
    private $__router;
    private $__db;
    private $__params;
	private $__controller;
    
    public function __construct()
    {
        $this->__config = singleton::getInstance("config");
        $this->__router = singleton::getInstance("router");
        $this->__db = singleton::getInstance("db");
        $this->__params = $this->__router->getParams();
		$this->__controller = $this->__router->getController();
	}
	
	public function joinEvent()
	{
		echo "Zapisz się na wydarzenie: $this->__controller <br />";
		if(isset($_SESSION[$this->__config->default_session_auth_var]))
		{
			$login = $_SESSION[$this->__config->default_session_auth_var];
			$exist = $this->__db->execute("SELECT event FROM user_events WHERE event = '$this->__controller' AND user ='{$login}'") ;
			if($exist == FALSE)
			{
				echo '<br /><a href="'.$this->__controller.'?'.'joinevent'.'='.'yes'.'">'.'Kliknij aby sie zapisać'.'</a>';
				if(isset($_GET['joinevent']) == 'yes')
				{				
				$result = $this->__db->execute("INSERT INTO `user_events` VALUES(NULL, '{$login}', '$this->__controller')");
				header("Location:".$_SERVER['HTTP_REFERER']."");
				}
			}
			else 
			{	
				echo '<br /><a href="'.$this->__controller.'?'.'joinevent'.'='.'no'.'">'.'Już jesteś zapisany na to wydarzenie. Kliknij aby sie wypisać'.'</a>';
				if(isset($_GET['joinevent']) == 'no')
				{
				$result = $this->__db->execute("DELETE FROM user_events WHERE user = '{$login}' AND event = '$this->__controller'");
				header("Location:".$_SERVER['HTTP_REFERER']."");
			}	}
		}
		else 
		{
			echo "<br />Zaloguj sie aby sie zapisać!";
		}
		
	}

	public function showCityEvent()
	{
		$events = $this->__db->execute("SELECT controller FROM articles WHERE city = (SELECT city FROM articles WHERE controller = '$this->__controller')");	

		foreach($events as $event)
		{
				echo '<ul>
 						 <li><a href="'.$event['controller'].'">'.str_replace('_',' ',$event['controller']).'</a></li>
 				     </ul>';		
		}
    }
	
	public function drawCommentList()
	{
	
		$result = "<table class=\"customTable\" cellspacing=\"0\">\n
		<tbody>
        <tr class=\"legend\">
            <td style=\"min-width: 30px!important; font-size: 15px; color:#1C4681;\">Nick</td>
            <td style=\"font-size: 15px; color:#1C4681;\">Komentarz</td>
        </tr>";
		
		$comments = $this->__db->execute("SELECT controller, username, comment FROM users u join comments c on u.id=c.id_user join articles a on a.id=c.id_articles WHERE a.controller = '{$this->__controller}'");		
		
		if(!empty($comments))
				{
					foreach($comments as $comment)
					{
						$result .= "<tr class=\"content\">
							<td style=\"min-width: 30px!important\" >{$comment['username']}</td>
							<td>{$comment['comment']}</td>			
							</tr>";
					}
		
					$result .= "</tbody></table>";
				}
		

			return $result;
	}

	protected function GetUserName()
	{
        $userName = $_SESSION['login'];
        return $userName;
    }

    protected function GetUserID()
    {
    	$name = $this->GetUserName();
        $userId = $this->__db->execute("SELECT id FROM users WHERE username = '{$name}'");
        return (int)$userId[0]['id'];
    }
	
	protected function GetArticleID()
    {
        $artId = $this->__db->execute("SELECT id FROM articles WHERE controller = '{$_POST['controller']}'");
        return $artId[0]['id'];
    }
	

	public function SaveComment()
	{	$_SESSION['controller'] = $_POST['controller'];
		if(isset($_SESSION['login']) && (isset($_POST['komentarz'])))
		{
		$COMMENT = $_POST['komentarz'];
		$login = $this->GetUserID();
		$artID = $this->GetArticleID();
		
		$result = $this->__db->execute("INSERT INTO `comments` VALUES(NULL, '{$artID}', '{$login}', '{$COMMENT}' )");
		
		header("Location:".$_SERVER['HTTP_REFERER'].'#other'."");
		
		return $result;		
		}
		
		else 
		{
			echo "Zaloguj sie!";
		}
		   
        
		
    }
	
	public function navigator()
	{
		return $this->__controller;
    }
	
}
?>