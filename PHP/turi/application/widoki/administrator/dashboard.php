<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="pl" lang="pl">

<head>
	<meta http-equiv="content-type" content="text/html; charset=utf-8" />
	<meta name="author" content="Łukasz Bielak - TuriCMS" />

<?=add_basehref()?>

<?=stylesheet_load('format.css,style.css,_cfe.css')?>

<?=javascript_load('administrator/_cfe.js,administrator/jquery-1.8.3.js,administrator/main.js')?> 
    
<?=icon_load("pp_fav.ico")?>
</head>

<body>
	
<div class="wrapper">
	
	<div class="header">
        <div class="_fLeft" id="logo"><img src="<?=directory_images()?>main_header_logo.png" alt="logotype" /></div>
        <div class="_fRight loginInfo"><div class="_auth">ZALOGOWANY JAKO:<br /><span><?=model_load("dashboardmodel", "getCredentials", "")?></span> (<a href="administrator/wylogowanie">Wyloguj</a>)</div></div>
    </div>
	
	<div class="wrapright">
	    <div id="colRight">
	      <p id="title">Witaj w panelu administracyjnym TuriCMS!</p><p id="intro">Aby przejść do zarządzania serwisem internetowym, wybierz pozycje menu z lewej strony.</p><br /><br />
            <div class="customTable _m5 _fLeft">
                <div class="tableTitle"><center>System zarządzania treścią TuriCMS</center></div>
                <div class="tableContent">
                	<div class="float">
                    <table class="text">
                    	<tr>
                    		<td class="bold">Statystyki serwisu</td>
                    	</tr>
                        <tr>
                            <td>Ilość stron</td>
                            <td><?=count(directory_map("application/widoki"))?></td>
                            <td></td>
                        </tr>
                        <tr>
                            <td>Ilość tłumaczonych stron</td>
                            <td><?=model_load("dashboardmodel","getTranslationsCount","")?></td>
                        </tr>
                        <tr>
                            <td>Ilość sekcji</td>
                            <td><?=count(directory_map("application/sekcje"))?></td>
                        </tr>
                        <tr>
                            <td>Ilość użytkowników serwisu</td>
                            <td><?=model_load("dashboardmodel","getUsersCount","")?></td>
                        </tr>
                        <tr>
                            <td>Ilość administratorów</td>
                            <td><?=model_load("dashboardmodel","getAdminsCount","")?></td>
                        </tr>
                    </table>
                    </div>
                    <div class="float">
                    <table class="text">
                    	<tr>
                        	<td><b class="bold">Lista wszystkich stron</b><?=model_load("dashboardmodel", "getAllElements", directory_map("application/widoki"))?></td>
                        </tr>
                    </table>
                    </div>
                    <div class="float">
                    <table class="text">
                    	<tr>
                        	<td><b class="bold">Lista wszystkich sekcji</b><?=model_load("dashboardmodel", "getAllElements", directory_map("application/sekcje"))?></td>
                        </tr>
                    </table>
                    </div>
                </div id="clear">
                <div class="tableActionButtons"></div>
            </div>
            
            <!--<div class="customTable _m5 _fLeft">
                <div class="tableTitle">Lista wszystkich stron</div>
                <div class="tableContent">
                    <div class="text">
						<?=model_load("dashboardmodel", "getAllElements", directory_map("application/widoki"))?>
                    </div>
                </div>
                <div class="tableActionButtons"></div>
            </div>
            
            <div class="customTable _m5 _fLeft">
                <div class="tableTitle">Lista wszystkich sekcji</div>
                <div class="tableContent">
                    <div class="text">
						<?=model_load("dashboardmodel", "getAllElements", directory_map("application/sekcje"))?>
                    </div>
                </div>
                <div class="tableActionButtons"></div>
            </div>-->
            
	    </div>
	</div>
	
	<div id="colLeft">
        <?=module_load("ADMINMENU")?>
    </div>
	
</div>
	
</body>