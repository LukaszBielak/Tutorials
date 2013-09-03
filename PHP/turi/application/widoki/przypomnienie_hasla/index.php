<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="pl" lang="pl">

<head>

<?=add_metatags()?>

<?=add_title("Przypomnienie hasła")?>

<?=add_basehref()?>

<?=stylesheet_load('logpanel.css, template_style.css')?>

<?=javascript_load('jquery-1.9.1.js,jquery.validate.js,jquery.MetaData.js,main.js,main.lost_password.js')?>
    
<?=icon_load("pp_fav.ico")?>

</head>

<body>

<div id="header">
	<div id="lang-changer">Język witryny: <a href="javascript:void(0);" onclick="changeLangTo('pl');"><img src="<?=directory_images()?>pl.png" alt="PL" /></a><a href="javascript:void(0);" onclick="changeLangTo('en');"><img src="<?=directory_images()?>gb.png" alt="GB" /></a></div>
    <?=module_load('LOGINPANEL')?>
</div>
<div id="templatemo_header">
    <div id="site_title"><h1><a href="" title="CityEvents">CityEvents</a></h1></div>
</div>
<div id="templatemo_main">
    <div id="content">
    	<div id="home_about" class="box">
           	  <h3>Przypomnienie hasła</h3>
                <p> Jeśli nie pamiętasz hasła, wypełni pola obok, a my odeślemi ci hasło na podanego przez Ciebie maila.</p>
        </div> 



<div id="main">
  <div class="content">
  		<?=model_load('przypomnienie_haslamodel', 'getContent', '')?>
  </div>
</div>


</body>
</html>