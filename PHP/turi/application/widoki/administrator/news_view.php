<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="pl" lang="pl">

<head>
	<meta http-equiv="content-type" content="text/html; charset=utf-8" />
	<meta name="author" content="Łukasz Bielak - TuriCMS" />

<?=add_basehref()?>

<?=stylesheet_load('format.css,style.css,_cfe.css')?>

<?=javascript_load('administrator/_cfe.js,
                    administrator/jquery-1.8.3.js,administrator/jquery.blockUI.js,administrator/main.js')?>

<script type="text/javascript" src="ckeditor/ckeditor.js"></script>
    
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
	    	
	    	<a href="administrator/articles">&lArr;Powrót do listy artykułów</a>
            
            <h2>Edycja artykułu</h2><br />
            
            <div class="customTable _m5 _fLeft">
                <div class="tableTitle">Nazwa wydarzenia</div>
                <div class="tableContent">
                    <input type="text" id="artTitle" class="customInput _mt10 _w300" name="pageTitle" value="<?=model_load('news_viewmodel', 'getTitle')?>" />
                </div>
                <div class="tableActionButtons"></div>
            </div>
            
            <div class="customTable _m5 _fLeft">
                <div class="tableTitle">Miasto</div>
                <div class="tableContent">
                    <input type="text" id="artCity" class="customInput _mt10 _w300" name="pageTitle" value="<?=model_load('news_viewmodel', 'getCity')?>" />
                </div>
                <div class="tableActionButtons"></div>
            </div>
             
            <div class="customTable _m5 _fLeft">
                <div class="tableTitle">Data dodania np. 2012-02-03 14:23:48</div>
                <div class="tableContent">
                    <input type="text" id="artDate" class="customInput _mt10 _w300" name="pageTitle" value="<?=model_load('news_viewmodel', 'getDate')?>" />
                </div>
                <div class="tableActionButtons"></div>
            </div>
            
            <div class="customTable _m5 _fLeft">
                <div class="tableTitle">Autor</div>
                <div class="tableContent">
                    <input type="text" id="artAuthor" class="customInput _mt10 _w300" name="pageTitle" value="<?=model_load('news_viewmodel', 'getAuthor')?>" />
                </div>
                <div class="tableActionButtons"></div>
            </div>
            
            <br class="_cb" /><br />
        
            <textarea cols="100" id="editor1" name="editor1" rows="90"><?=model_load('news_viewmodel', 'getText')?></textarea>
            <?=add_javascript(directory_javascript()."administrator/main.articles.js")?>
            
            <br />
            <div id="customLinkBtn" class="_m5 _fLeft"><a href="javascript:void(0);" onclick="saveNews('<?=model_load('news_viewmodel', 'getId')?>'); addNewNews('');">Zapisz zmiany</a></div>
            <br class="_cb" />
            
        </div>
        
	</div> 
       
    <div id="colLeft">
        <?=module_load("ADMINMENU")?>
    </div>
      
</div>

</body>
</html>