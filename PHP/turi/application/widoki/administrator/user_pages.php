<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="pl" lang="pl">

<head>
	<meta http-equiv="content-type" content="text/html; charset=utf-8" />
	<meta name="author" content="Łukasz Bielak - TuriCMS" />

<?=add_basehref()?>

<?=stylesheet_load('format.css,style.css,_cfe.css')?>

<?=javascript_load('administrator/_cfe.js,administrator/jquery-1.7.1.min.js,administrator/jquery.blockUI.js,administrator/main.js')?> 
    
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
	    	
	    	<div class="customTable _m5 _fLeft">
	            <div class="tableTitle">Lista stron</div>
	            <div class="tableContent">
        		<p><?=model_load("user_pagesmodel", "drawAllSitesTables", "")?></p>
        		</div>
        		<div class="tableActionButtons"></div>
            	<div class="customLinkBtn _m5 _fLeft"><a href="javascript:void(0);" onclick="addNewPage('');">NOWA STRONA</a></div>                      
        </div>       
	</div>     
</div>
	<div id="colLeft">
        <?=module_load("ADMINMENU")?>
    </div>
</div>
 
</body>
</html>