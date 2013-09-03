<?php

class usersmodel
{
    private $__config;
    private $__router;
    private $__db;
    private $__params;
    
    public function __construct()
    {
        $this->__config = singleton::getInstance("config");
        $this->__router = singleton::getInstance("router");
        $this->__db = singleton::getInstance("db");
        $this->__params = $this->__router->getParams();
	}
	
	public function drawUsersList()
	{
		$result = "<table class=\"text wideTable\" cellspacing=\"0\">\n
		<tbody>
        <tr class=\"legend\">
            <td style=\"min-width: 30px!important\">ID</td>
            <td>Nick</td>
            <td>Imie i nazwisko</td>
            <td>Hasło</td>
            <td>Mail</td>
            <td>Data urodzenia</td>
            <td>Funkcja</td>
        </tr>";
		
		$users = $this->__db->execute("SELECT id, username, fullname, password, mail, birthdate FROM users");
		
		
		if(!empty($users))
				{
					foreach($users as $user)
					{
						$result .= "<tr class=\"content\">
							<td style=\"min-width: 30px!important\">{$user['id']}</td>
							<td>{$user['username']}</td>
							<td>{$user['fullname']}</td>
							<td>{$user['password']}</td>
							<td>{$user['mail']}</td>
							<td>{$user['birthdate']}</td>
							<td><a class=\"subtle\" href=\"".SERVER_ADDRESS."administrator/users/view/".$user['id']."\">Edycja</a> | <a class=\"subtle\" href=\"javascript:void(0);\" onClick=\"removeUser('".$user['id']."');\">Usuń</a></td>						
							</tr>";
					}
		
					$result .= "</tbody></table>";
				}
		

			return $result;
	}

	public function drawUserEventsList()
	{
		$result = "<table class=\"text wideTable\" cellspacing=\"0\">\n
		<tbody>
        <tr class=\"legend\">
            <td style=\"min-width: 30px!important\">ID</td>
            <td>Użytkownik</td>
            <td>Nazwa wydarzenia</td>
        </tr>";
		
		$events = $this->__db->execute("SELECT id, user, event FROM user_events order by user");
		
		
		if(!empty($events))
				{
					foreach($events as $event)
					{
						$result .= "<tr class=\"content\">
							<td style=\"min-width: 30px!important\">{$event['id']}</td>
							<td>{$event['user']}</td>
							<td>{$event['event']}</td>						
							</tr>";
					}
		
					$result .= "</tbody></table>";
				}
		

			return $result;
	}
}