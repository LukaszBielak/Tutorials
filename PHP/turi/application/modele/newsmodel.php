<?php

class newsmodel
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
	
	public function listaWydarzen()
	{
		$result = "<table class=\"text wideTable\" cellspacing=\"0\">\n
		<tbody>
        <tr class=\"legend\">
            <td style=\"min-width: 30px!important\">ID</td>
            <td>Nazwa wydarzenia</td>
            <td style=\"max-width: 600px!important\">Skrócona treść</td> 
            <td>Data dodania</td>
            <td>Autor</td>
            <td>Ocena</td>
            <td>Funkcje</td>
        </tr>";
		
		$articles = $this->__db->execute("SELECT articles.id, articles.title, articles.text, articles.date, articles.author, SUM(ocena) as ocena 
		FROM articles 
		LEFT JOIN votes on articles.id = votes.id_artykul 
		GROUP BY articles.id");
		
		if(!empty($articles))
		{
			foreach($articles as $article)
			{
				$result .= "<tr class=\"content\">
					<td style=\"min-width: 30px!important\">{$article['id']}</td>
					<td>{$article['title']}</td>
					<td style=\"max-width: 600px!important\">".substr($article['text'], 0, 497)."...</td>
					<td>{$article['date']}</td>
					<td>{$article['author']}</td>
					<td>{$article['ocena']}</td>
					<td><a class=\"subtle\" href=\"".SERVER_ADDRESS."administrator/news/view/".$article['id']."\">Edycja wydarzenia</a> | <a class=\"subtle\" href=\"javascript:void(0);\" onClick=\"removeNews('".$article['id']."');\">Usuń wydarzenie</a></td>
				</tr>";
			}

			$result .= "</tbody></table>";
		}

			return $result;
	}
}



















?>