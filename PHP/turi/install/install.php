
<html>
	<body>
<div style="border-style: solid ; border-width: 1px; margin: 100px 400px; padding: 30px;">
<?php
	if($_POST['submit'])
{
	echo "Ustawienia konfiguracyjne zostały zapisany. Aby je zmienić, przejdź do edycji pliku configs.php w katalogu core/config.";
}
?>
		<br />
		<br />	
		Krok 1. Tworzenie pliku konfiguracyjnego! Proszę wypełnić poniższe pola.
		<br />
		<br />
<form action="" method="POST">
<table>
<tr><th></th><th>Bazy danych</th></tr>
<tr><th>Nazwa bazy</th><td><input type="text" name="dbname" /></td></tr>
<tr><th>Host</th><td><input type="text" name="dbhost" /></td></tr>	
<tr><th>Nazwa użytkownika</th><td><input type="text" name="dbuser" /></td></tr>	
<tr><th>Hasło</th><td><input type="password" name="dbpass" /></td></tr>

<tr><th></th><th>Administrator</th></tr>
<tr><th>Imie</th><td><input type="text" name="aname" /></td></tr>
<tr><th>Nazwisko</th><td><input type="text" name="asurname" /></td></tr>	
<tr><th>Login</th><td><input type="text" name="alogin" /></td></tr>	
<tr><th>Hasło</th><td><input type="password" name="apass" /></td></tr>	
</table>
<br />
<br />

<input type="submit" name="submit" />
</form>
<input type="button" name="submit" value="Przejdz do kroku 2" onclick="window.location = 'step2.php'"; />	
</div>
</body>
</html>

<?php
$configurations = $_POST;
$file = '../core/config/configs.php';
$file_contents = file_get_contents($file);
$fh = fopen($file, "w");
foreach ($configurations as $key => $configuration) 
{
	$file_contents = str_replace($key,$configuration,$file_contents);
}
fwrite($fh, $file_contents);
fclose($fh);	

?>