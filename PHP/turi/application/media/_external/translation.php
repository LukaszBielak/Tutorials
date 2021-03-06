<?php
include_once("../../../core/main/singleton.php");
include_once("../../../core/config/configs.php");
include_once("../../../core/main/config.php");
include_once("../../../core/db/db.php");

$db = new db($configs['db_host'], $configs['db_user'], $configs['db_pass'], $configs['db_name']);//łączenie z bazą dancyh


if(isset($_POST['addNewID']))//sprawdza czy w poście jest addNewID
{
	$sql = $db->execute("ALTER TABLE {$_POST['tablename']} ADD {$_POST['columnname']} LONGTEXT NOT NULL");//dodawanie kolumny do tabeli
	echo ($sql === true) ? $sql : "false"; //echo w ajaxie jest tako return
}
elseif(isset($_POST['editID']))
{
	$res = "";
	
	$tbl = $_POST['tablename'];
	$col = $_POST['columnname'];
	
	unset($_POST['editID'], $_POST['tablename'], $_POST['columnname']);
	
	foreach($_POST as $key => $val)
	{
		$val = addslashes($val);
		$sql = $db->execute("UPDATE {$tbl} SET {$col} = '{$val}' WHERE lang = '{$key}'");
	}
	
	echo ($sql === true) ? "true" : "false";
}
elseif(isset($_POST['checkTr']))
{
    $dec = strtolower($_POST['name']);
    $code_entities_match = array(' ','--','&quot;','!','@','#','$','%','^','&','*','(',')','+','{','}','|',':','"','<','>','?','[',']','\\',';',"'",',','.','/','*','+','~','`','=');
    $dec = str_replace($code_entities_match, '', $dec);
    $dec = addslashes($dec);
    $sql = $db->execute("SHOW TABLES LIKE 'tr_{$dec}'");
    echo (empty($sql)) ? "true" : "false";
}
elseif(isset($_POST['removeTr']))
{
	$q = $db->execute("DROP TABLE {$_POST['tablename']}");
	echo ($q) ? "true" : "false";
}
else
{
	die("Dostęp z zewnątrz zabroniony!");
}

?>