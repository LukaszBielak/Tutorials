<?php

class db
{
	public $result = Array();
	private $connect;
	
	public function __construct($_host=false, $_user=false, $_pass=false, $_name=false)
	{
		$config = singleton::getInstance("config");
		
		$host = $config->db_host;
        $user = $config->db_user;
        $pass = $config->db_pass;
        $name = $config->db_name;
		
		if(!isset($host))
		{
			$host = $_host;
            $user = $_user;
            $pass = $_pass;
            $name = $_name;
		}
		
		if($host === false)
		{
			die('Nie przekazano danych dostępowych do bazy.');
		}
		
		$this->connect = new mysqli($host, $user, $pass, $name);
		if(mysqli_connect_errno() !== 0)
		{
			throw new Exception("Błąd połączenia z bazą danych : ".mysqli_connect_error());
		}
		else
		{
			$this->connect->query("SET NAMES 'utf8'");
			return $this->connect;
		}
	}
	
	public function execute($sql)
	{
		$query_arr = explode(" ", trim($sql));
		$query_type = strtoupper($query_arr[0]);
		
		if($query_type == 'SELECT' || $query_type == 'SHOW')
		{
			return $this->selectable($sql);//zapytania wybierające
		}
		else if($query_type == 'UPDATE' || $query_type == 'DELETE' || $query_type == 'DROP' || $query_type == 'INSERT' || $query_type == 'ALTER' || $query_type == 'CREATE')
		{
			$fixit = $this->charset_utf_fix($sql);
            return $this->modifiable($fixit);
		}
		
		return false; 
	}
	
	//function charset_utf_fix()
   
   public function charset_utf_fix($query)
   {
      $utf_iso = array(
      "%u0104" => "&#260;",
      "%u0106" => "&#262;",
      "%u0118" => "&#280;",
      "%u0141" => "&#321;",
      "%u0143" => "&#323;",
      "%u015A" => "&#346;",
      "%u0179" => "&#377;",
      "%u017B" => "&#379;",
      "%u0105" => "&#261;",
      "%u0107" => "&#263;",
      "%u0119" => "&#281;",
      "%u0142" => "&#322;",
      "%u0144" => "&#324;",
      "%u015B" => "&#347;",
      "%u017A" => "&#378;",
      "%u017C" => "&#380;"
       );
       return str_replace(array_keys($utf_iso), array_values($utf_iso), $query);
    }
   
   public static function charset_utf_fixit($query)
   {
      $utf_iso = array(
      "%u0104" => "Ą",
      "%u0106" => "Ć",
      "%u0118" => "Ę",
      "%u0141" => "Ł",
      "%u0143" => "Ń",
      "%u015A" => "Ś",
      "%u0179" => "Ź",
      "%u017B" => "Ż",
      "%u0105" => "ą",
      "%u0107" => "ć",
      "%u0119" => "ę",
      "%u0142" => "ł",
      "%u0144" => "ń",
      "%u015B" => "ś",
      "%u017A" => "ź",
      "%u017C" => "ż",
      "&oacute;" => "ó",
      "&#39;"=>"'"
       );
       return str_replace(array_keys($utf_iso), array_values($utf_iso), $query);
    }
   
   //end function charset_utf_fix()
	
	private function selectable($query)
	{
		$this->result = array();
		
		$wynik = $this->connect->query($query);
		if(!$wynik)
		{
			return false;
		}
		else
		{
			while (($db_result = $wynik->fetch_assoc()) !== null)
			{
				array_push($this->result, $db_result);
			}
			
			
			return $this->result;
		}
		
		$this->close();
	}
	
	private function modifiable($query)
	{
		$this->result = array();
		
		$wynik = $this->connect->query($query);
		return (!($wynik)) ? false : true;
	}
	
	public function getRow()
	{
		$row = mysqli_fetch_row($this->result);
		return $row;
	}
	
	public function count()
	{
		$count = count($this->result);
		return (!$count || !is_int($count)) ? 0 : $count;
	}
	
	public function close()
	{
		if($this->connect) mysqli_close($this->connect);
	}
	
	public function __destruct()
	{
		$this->close();
	}
}

?>