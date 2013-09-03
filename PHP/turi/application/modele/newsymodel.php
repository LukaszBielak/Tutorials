<?php
if(!isset($_SESSION))
{
	session_start();
}

class newsymodel
{
	private $config;
    private $params;
    private $router;
    private $db;
	
	public function __construct()
	{
		$this->config = singleton::getInstance("config");
        $this->router = singleton::getInstance("router");
        $this->db = singleton::getInstance("db");
		$this->params = $this->router->getParams();
	}
	
	public function getLimit()
	{
		if(isset($this->params['POST']['ilosc']))
		{
			if($this->params['POST']['ilosc'] == "ALL")
			{
				$limit = "<optgroup label=\"OSTATNIO:\"><option value=\"ALL\">wszystkie wydarzenia</option></optgroup>";
			}
			else
			{
				$limit =  "<optgroup label=\"OSTATNIO:\">
				<option value=\"{$this->params['POST']['ilosc']}\">po {$this->params['POST']['ilosc']} wydarzeniach</option>
				</optgroup>\n";
			}
		}
		else
		{
			$limit = "";
		}
		
		return $limit;
	}
	
	public function getCity()
	{
		if(isset($this->params['POST']['miasto']))
		{
			if($this->params['POST']['miasto'] == "ALL")
			{
				$miasto = "<optgroup label=\"OSTATNIO:\"><option value=\"ALL\">wszystkie artykuły</option></optgroup>";
			}
			else
			{
				$miasto =  "<optgroup label=\"OSTATNIO:\">
				<option value=\"{$this->params['POST']['miasto']}\">{$this->params['POST']['miasto']}</option>
				</optgroup>\n";
			}
		}
		else
		{
			$miasto = "";
		}
		
		return $miasto;
	}
	
	public function getCities()
	{
		
		$cities = $this->db->execute("SELECT distinct city from articles");
		
		foreach($cities as $city)
		{
			echo "<option value='{$city['city']}'>{$city['city']}</option>";
		}
		
	
	}
	
	public function getSort()
	{
		if(isset($this->params['POST']['sort']))
		{
			$sort = "<optgroup label=\"OSTATNIO:\">";
			
			switch($this->params['POST']['sort'])
			{
				case "title":
				$sort .= "<option value=\"title\">Tytułu</option>";
				break;
					
				case "date":
				$sort .= "<option value=\"date\">Daty dodania</option>";
				break;
					
				case "author":
				$sort .= "<option value=\"author\">Autora</option>";
				break;
					
				case "vote":
				$sort .= "<option value=\"vote\">Rankingu</option>";
				break;
			}
			
			$sort .= "</optgroup>";
		}
		else
		{
			$sort = "";
		}
		
		return $sort;
	}
	
	public function getAsc()
	{
		if(isset($this->params['POST']['sort-asc-desc']))
		{
			if($this->params['POST']['sort-asc-desc'] == "ASC")
			{
				$asc = "<optgroup label=\"OSTATNIO:\">
				<option value=\"".$this->params['POST']['sort-asc-desc']."\">Rosnąco</option>
                </optgroup>";
			}
			else
			{
				$asc = "<optgroup label=\"OSTATNIO:\">
                <option value=\"".$this->params['POST']['sort-asc-desc']."\">Malejąco</option>
                </optgroup>\n";
			}
		}
		else
		{
			$asc = "";
		}
		
		return $asc;
	}
	
	public function getArticles()
	{
		
		$v = singleton::getInstance("voter");
		
		if(isset($this->params['POST']['ilosc']))
		{
			$limit = ($this->params['POST']['ilosc'] == "ALL") ? "" : "LIMIT {$this->params['POST']['ilosc']}";
			$where = ($this->params['POST']['miasto'] == "ALL") ? "" : "WHERE city = '{$this->params['POST']['miasto']}'";
			
			
			if($this->params['POST']['sort'] == "vote")
			{
				$articles = $this->db->execute("SELECT articles.id, articles.title, articles.text, articles.date, articles.author, votes.id_user, AVG(votes.ocena) AS ocena FROM articles LEFT JOIN votes ON articles.id=votes.id_artykul GROUP BY votes.id_artykul ORDER BY ocena {$this->params['POST']['sort-asc-desc']} {$limit}");
			}
			else
			{
				$articles = $this->db->execute("SELECT * FROM articles {$where} ORDER BY {$this->params['POST']['sort']} {$this->params['POST']['sort-asc-desc']} {$limit}");
			}
		}
		else
		{
			$articles = $this->db->execute("SELECT * FROM articles");
		}
		
		if(isset($_GET['miasto']))
		{
			$articles = $this->db->execute("SELECT * FROM articles WHERE city = '{$_GET['miasto']}'");
		}
			
		$login = (isset($_SESSION[$this->config->default_session_auth_var])) ? "" : "<span style=\"float:right;\"><a href=\"#top\">Zaloguj się</a> lub <a href=\"rejestracja/\">zarejestruj</a>, aby móc oceniać!</span>";
		$rating = (isset($_SESSION[$this->config->default_session_auth_var])) ? $_SESSION[$this->config->default_session_auth_var] : "";	
		foreach($articles as $article)
		{
			echo '
            <div class="artykul">
                <h3 class="title"><a href="'.$article['controller'].'">'.$article['title'].'</a></h3>
                <p class="sub-title">Dodano: '.$article['date'].' przez '.$article['author'].'. Miejsce wydarzenia '.$article['city'].'</p> 
                '.$article['text'].'<br />';
                            
                echo $v->RatingGenerator($rating,$article['id']);   
                echo $login.'
                <hr>
                        
            </div>';
                
                
		}
		
		
	}

	public function saveVote()
	{
		$res = false;
		
		if(isset($this->params['POST']['rating']))
		{
			$v = singleton::getInstance("voter");
			$artId = 0;
			$artVote = 0;
			
			foreach($this->params['POST'] as $key => $val)
			{
				if(substr($key, 0, 5) == "artId")
				{
					$artId = (int)substr($key, 6);
					$artVote = $val;
				}
			}
			
			$res = $v->setVote($artVote, $_SESSION['login'], $artId);
		}
		
		echo ($res) ? "true" : "Wystąpił błąd podczas zapisywania Twojego głosu! Przepraszamy!";
	}
}



?>