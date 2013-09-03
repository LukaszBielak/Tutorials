<?php

class offermodel
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
	
	public function drawOfferList()
	{
		$result = "<table class=\"customTable\" cellspacing=\"0\">\n
		<tbody>
        <tr class=\"legend\">
            <td style=\"min-width: 30px!important\">ID</td>
            <td>Data</td>
            <td>Miasto</td>
            <td>Wyżywienie</td>
            <td>Cena</td>
            <td>Rezerwuj</td>
        </tr>";
		
		$offers = $this->__db->execute("SELECT id, date_from, date_to, city, alimentation, price FROM offers");		
		
		if(!empty($offers))
				{
					foreach($offers as $offer)
					{
						$result .= "<tr class=\"content\">
							<td style=\"min-width: 30px!important\">{$offer['id']}</td>
							<td>od {$offer['date_from']} <br />do {$offer['date_to']}</td>
							<td>{$offer['city']}</td>
							<td>{$offer['alimentation']}</td>
							<td>{$offer['price']}zł</td>				
							</tr>";
					}
		
					$result .= "</tbody></table>";
				}
		

			return $result;
	}
	
	public function drawCommentList()
	{
		$result = "<table class=\"customTable\" cellspacing=\"0\">\n
		<tbody>
        <tr class=\"legend\">
            <td style=\"min-width: 30px!important\">ID</td>
            <td>Nick</td>
            <td>Komentarz</td>
        </tr>";
		
		$comments = $this->__db->execute("SELECT u.id, username, comment FROM users u join comments c on u.id=c.id_user");		
		
		if(!empty($comments))
				{
					foreach($comments as $comment)
					{
						$result .= "<tr class=\"content\">
							<td style=\"min-width: 30px!important\">{$comment['id']}</td>
							<td>{$comment['username']}</td>
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

	public function SaveComment()
	{	
		if(isset($_SESSION['login']) && (isset($_POST['komentarz'])))
		{
		$COMMENT = $_POST['komentarz'];
		$login = $this->GetUserID();
		
		$result = $this->__db->execute("INSERT INTO `comments` VALUES(NULL, '1', '{$login}', '{$COMMENT}' )");
		
		header("Location:".$_SERVER['HTTP_REFERER']."");
		
		return $result;		
		}
		
		else 
		{
			echo "Zaloguj sie!";
		}
		   
        
		
    }
	
	public function ShowCityEvent()
	{
		$events = $this->__db->execute("SELECT title FROM articles WHERE city = (SELECT city FROM articles WHERE controller = '$this->__controller')");	
		echo "Lista wydarzeń w tym mieście";
		foreach($events as $event)
		{
				echo '<ul>
 						 <li><a href="'.$event['title'].'">'.$event['title'].'</a></li>
 				     </ul>';		
		}
    }
	
	public function joinEvent()
	{
		echo "zapisz sie na wydarzenie $this->__controller";
		if(isset($_SESSION[$this->__config->default_session_auth_var]))
		{
			$login = $_SESSION[$this->__config->default_session_auth_var];
			$exist = $this->__db->execute("SELECT event FROM user_events WHERE event = '$this->__controller' AND user ='{$login}'") ;
			if($exist == FALSE)
			{
				echo '<a href="'.$this->__controller.'?'.'joinevent'.'='.'yes'.'">'.'Kliknij aby sie zapisać'.'</a>';
				if(isset($_GET['joinevent']) == 'yes')
				{				
				$result = $this->__db->execute("INSERT INTO `user_events` VALUES(NULL, '{$login}', '$this->__controller')");
				header("Location:".$_SERVER['HTTP_REFERER']."");
				}
			}
			else 
			{	
				echo '<a href="'.$this->__controller.'?'.'joinevent'.'='.'no'.'">'.'Kliknij aby sie wypisać'.'</a>';
				if(isset($_GET['joinevent']) == 'no')
				{
				$result = $this->__db->execute("DELETE FROM user_events WHERE user = '{$login}' AND event = '$this->__controller'");
				header("Location:".$_SERVER['HTTP_REFERER']."");
			}	}
		}
		else 
		{
			echo "Zaloguj sie aby sie zapisać!";
		}
		
	}	
	
}
	
	

?>