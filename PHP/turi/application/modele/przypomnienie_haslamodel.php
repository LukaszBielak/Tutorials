<?php

class przypomnienie_haslamodel
{
	private $__config;
	private $__router;
    private $__params;
    private $__db;
	
	public function __construct()
	{
		$this->__config = singleton::getInstance("config");
		$this->__router = singleton::getInstance("router");
        $this->__params = $this->__router->getParams();
        $this->__db = singleton::getInstance("db");
	}
	
	private function updateUserPasswd($LOGIN, $newPw)
	{
		$query = $this->__db->execute("UPDATE users SET password = '{$newPw}' WHERE username = '{$LOGIN}'");
		return $query;
	}
	
	private function isExistByLoginMail($LOGIN, $MAIL)
	{
		$query = $this->__db->execute("SELECT * FROM users WHERE username = '{$LOGIN}' AND mail = '{$MAIL}' LIMIT 1");
		return $query;
	}
	
	private function LostPassword($LOGIN, $MAIL)
	{
		if($this->isExistByLoginMail($LOGIN, $MAIL) && count($this->isExistByLoginMail($LOGIN, $MAIL)) > 0)
		{
			return true;
		}
		else
		{
			return false;
		}
	}
	
	public function getContent()
	{
		$content = "";
		
		if(isset($this->__params['POST']['nick']))
		{
			$content .= '<div class="box-artykuly produkty-opis">';
            
			
			if($this->LostPassword($this->__params['POST']['nick'], $this->__params['POST']['mail']))
			{
				$signs = array('a', 'b', 'c', 'd', 'e', 'f', 'g', 'h', 'i', 'j', 'k', 'l', 1, 2, 3, 4, 5, 6, 7, 8, 9, 0, '@', '#', '$', '%', '&', '*');
				
				$newPw = "";
				
				for($i = 0; $i <= 8; $i++)
				{
					$newPw .= $signs[rand(0, count($signs)-1)];
				}
				
				if($this->updateUserPasswd($this->__params['POST']['nick'], md5($newPw)))
				{
					$content .= '<h3>Twoje hasło zostało zresetowane<br /> i wysłane na skrzynkę pocztową użytkownika:<br /> '.$this->__params['POST']['mail'].'</h3>
                    <p>Twoje nowe hasło to: '.$newPw.'</p><br /><br />'; 
				}
				else
				{
					$content .= 'Niestety nie udało się zresetować Twojego hasła - wystąpił błąd!';
				}
				
				$mailer = mail($this->__params['POST']['mail'], "Wygenerowanie nowego hasła", "Wygenerowanie nowego hasła", "Twoje nowe hasło: <b>".$newPw."</b>");
			}
			else
			{
				$content .= 'Niestety nie udało się zresetować Twojego hasła - wystąpił błąd!';
			}
			
			$content .= "</div>";
		}
		else
		{
			$content = '<div class="box-artykuly produkty-opis">
                
                	
                    <div id="lostpw-tools" class="formularz">
                    
                        <form name="lostpw-form" id="lostpw-form" action="" method="POST">
                    
                    <table class="objTable">
                        
                        <tbody>
                            
                            <tr>
                                <td><span class="star">*</span> Podaj nick:</td>
                                <td><input type="text" value="" name="nick" class="required" minlength="5" maxlength="25" /></td>
                                <td></td>
                            </tr>
                            
                            <tr>
                                <td><span class="star">*</span> Twój e-mail:</td>
                                <td><input type="text" value="" name="mail" class="required email" /></td>
                                <td></td>
                            </tr>
                            
                        </tbody>
                        
                    </table>
                    
                       <br /><br />
                       
                       <input type="submit" name="submit-form" class="submit-form" value="Przypomnij" />
                       <input type="reset" name="submit-form" class="reset-form" value="Reset" /><br class="clear" />
                       </form>
                       
                       <br /><br />
                    
                    </div>
                    
                </div>';
		}

		return $content;
	
	}
}

?>