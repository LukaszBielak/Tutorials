<?php

class managementmodel
{
	private $__config;
    private $__router;
    private $__db;
    private $__params;
	
	public function __construct()//konstruktor rejestrujący zmienne
    {
        $this->__config = singleton::getInstance("config");
        $this->__router = singleton::getInstance("router");
        $this->__db = singleton::getInstance("db");
        $this->__params = $this->__router->getParams();//pobiera parametry z paska adresu
    }
	
	private function getTranslationsTables()
    {
        $q = $this->__db->execute("SHOW TABLES");// pokazuje wszystkie tabele z bazy
        $bufor = Array();
        
        foreach($q as $val)
        {
            if(substr($val['Tables_in_'.$this->__config->db_name], 0, 3) == "tr_")// sprawdza czy tablela zaczyna sie na tr_
            {
                $bufor[] = $val['Tables_in_'.$this->__config->db_name];//jeśli tak zapisuje do bufora
            }
        }
        
        return $bufor;//zwraca bufor
    }
	
	private function getAvailableLangs($tbl_name)// metoda pobierająca wszyskie dostępne języki w bazie danych
	{
		$q = $this->__db->execute("SELECT DISTINCT lang FROM $tbl_name");//zwraca niepowtarzające sie wiersze z kolumny lang
		if(empty($q))//jeżeli puste
		{
			return ;
		}
		else
		{
			foreach($q as $lang)//do tablicy res wrzuca kolejno elementy przetworzone w pętli
			{//wstawia flage języka do tabeli
				$res[] = "<img src=\"".directory_images()."flags/".strtolower($lang['lang']).".png\" alt=\"".$lang['lang']."\" />";
			}
		}
		
		return $res;//zwrócenie res
	}
	
	public function drawTranslationsTable()
	{
		$res = '<table class="text wideTable">
                        <tr class="legend">
                            <td>Nazwa</td>
                            <td class="sec">ID tłumaczenia</td>
                            <td class="thd">Języki strony</td>
                            <td>Funkcje</td>
                        </tr>';
						
		$langs = Array();
		
		$tbls = $this->getTranslationsTables();//wynik tego co co zwróciłe gettranclationtables
		foreach($tbls as $tbl)
		{
			$cols = "";
			$res .= '<tr class="content">
                        <td><strong>'.str_replace("_", "/", substr($tbl, 3)).'</strong></td>';
			
			$q = $this->__db->execute("SHOW COLUMNS IN $tbl");//odczytanie kolumn w tabeli którą iterujemy
			
			foreach($q as $key => $val)
			{
				if($val['Field'] != "id" && $val['Field'] != "lang")//czy field będzie różne od id i czy fild bedzie różny od lang
				{
					$cols .= $val['Field'].", ";//jeśli tak to to do zmiennej cols przypisz to co zwróciło zapytanie
				}
			}
			
			$res .= "<td>".rtrim($cols, ", ")."</td>";//usuwanie ostatniego przecinka
            $res .= "<td>".implode("&nbsp;", $this->getAvailableLangs($tbl))."</td>"; //skleja wszystkie obrazki języków &nbsp
			$res .= '<td><input type="submit" value="Edycja" onclick="window.location.replace(\''.SERVER_ADDRESS.'administrator/management/translationEditor/'.$tbl.'\');" class="customBtn editBtn _m5" />
                         <input type="submit" value="Usuń" onclick="removeTranslation(\''.$tbl.'\');" class="customBtn removeBtn _m5" /></td>
                    </tr>';
		}

		$res .= "</table>";
		
		return $res;
	}
}

?>