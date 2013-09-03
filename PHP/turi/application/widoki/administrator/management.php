<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="pl" lang="pl">

<head>
	<meta http-equiv="content-type" content="text/html; charset=utf-8" />
	<meta name="author" content="Łukasz Bielak - TuriCMS" />

<?=add_basehref()?>

<?=stylesheet_load('format.css,style.css,_cfe.css')?>

<?=javascript_load('administrator/_cfe.js,administrator/jquery-1.8.3.js,administrator/jquery.blockUI.js,administrator/main.js')?> 
    
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
	    	<div id="customLinkBtn" class="_m5 _fLeft"><a href="<?=SERVER_ADDRESS.'administrator/management/translationCreator'?>">DODAJ NOWE...</a></div>
        
	        <br class="_cb" />
	        
	            <div class="customTable _m5 _fLeft">
	                <div class="tableTitle">Tłumaczenia serwisu</div>
	                <div class="tableContent">
	                    <?=model_load("managementmodel", "drawTranslationsTable", "")?>
	                </div>
	                <div class="tableActionButtons"></div>
	            </div>
	    </div>
	</div>
	
	<div id="colLeft">
        <?=module_load("ADMINMENU")?>
    </div>
	
</div>
	
</body>