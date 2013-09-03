<html>
	<body>
<div style="border-style: solid ; border-width: 1px; margin: 100px 400px; padding: 30px;">			
		Krok 2. Tworzenie bazy danych! Kliknij w link aby utworzyc!
		<br />
		<br />
<form action="" method="POST">	
<table>
<tr><th>Import bazy danych(min)</th><td><input type="submit" name="createdbmin" value="Kliknij" /></td></tr>
<tr><th>Import bazy danych(max)</th><td><input type="submit" name="createdbmax" value="Kliknij" /></td></tr>
</table>
</form>
<input type="button" name="submit" value="Przejdz do kroku 3" onclick="window.location = 'step3.php'"; />
</div>
</body>
</html>

<?php
	
include_once("../core/config/configs.php");
  
$connection = mysql_connect($configs['db_host'], $configs['db_user'], $configs['db_pass']) or die(mysql_error());
mysql_select_db($configs['db_name'], $connection) or die(mysql_error());

if(isset($_POST['createdbmin']))
{ 
	SplitSQL('../../turicms(min).sql'); 
	$res = mysql_query("INSERT INTO administrator VALUES (NULL, '{$configs['admin_name']}', '{$configs['admin_surname']}', '{$configs['admin_login']}', '{$configs['admin_pass']}', 'admin')"); 
}
if(isset($_POST['createdbmax']))
{
	SplitSQL('../../turicms(max).sql'); 
	$res = mysql_query("INSERT INTO administrator VALUES (NULL, '{$configs['admin_name']}', '{$configs['admin_surname']}', '{$configs['admin_login']}', '{$configs['admin_pass']}', 'admin')"); 
	 
}
function SplitSQL($file, $delimiter = ';')
{
    set_time_limit(0);

    if (is_file($file) === true)
    {
        $file = fopen($file, 'r');

        if (is_resource($file) === true)
        {
            $query = array();

            while (feof($file) === false)
            {
                $query[] = fgets($file);

                if (preg_match('~' . preg_quote($delimiter, '~') . '\s*$~iS', end($query)) === 1)
                {
                    $query = trim(implode('', $query));

                    if (mysql_query($query) === false)
                    {
                        echo '<h3>ERROR: ' . $query . '</h3>' . "\n";
                    }

                    else
                    {
                        echo '<h3>SUCCESS: ' . $query . '</h3>' . "\n";
                    }

                    while (ob_get_level() > 0)
                    {
                        ob_end_flush();
                    }

                    flush();
                }

                if (is_string($query) === true)
                {
                    $query = array();
                }
            }

            return fclose($file);
        }
    }

    return false;
}
	

?>