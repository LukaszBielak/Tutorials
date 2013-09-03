<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="pl" lang="pl">
<head>
<?=add_metatags()?>

<?=add_title("Nowa strona - events")?>

<?=add_basehref()?>

<?=stylesheet_load('template_style.css, slimbox2.css, logpanel.css')?>
        
<?=javascript_load('jquery-1.9.1.js,main.js, jquery.localscroll-min.js, jquery.scrollTo-min.js, slimbox2.js')?>

<?=icon_load("pp_fav.ico")?>

</head>

<body><div id="header">
<div id="lang-changer">Język witryny: <a href="javascript:void(0);" onclick="changeLangTo('pl');"><img alt="PL" src="application/media/images/pl.png" /></a><a href="javascript:void(0);" onclick="changeLangTo('en');"><img alt="GB" src="application/media/images/gb.png" /></a></div>
<?=module_load('LOGINPANEL')?></div>

<div id="templatemo_header">
<div id="site_title">
<h1><a href="" title="CityEvents">CityEvents</a></h1>
</div>
</div>

<div id="templatemo_main">
<div id="content">
<div class="section section_with_padding" id="event">
<h2><?=dodaj_tlumaczenie('title')?></h2>

<div class="img_border img_fl"><img alt="image" height="160" src="kfm-1.4.7/uploads/beyonce/b7.jpg" width="360" /></div>

<div class="half right">
<ul class="list_bullet">
	<li>Niezapomniana atmosfera!</li>
	<li>Największa gwazda muzyki POP</li>
	<li>NAjwiększe takie wydarzenie w Warszzwie!</li>
	<li>Dziesiątki tysięcy sprzedanych biletów</li>
	<li>Występy innych gwiazd!</li>
	<li>Dodatkowe atrakcje!</li>
	<li>Musisz tam być!</li>
</ul>
</div>

<div class="clear h20"> </div>

<div class="img_nom img_border" id="location"><iframe frameborder="0" height="215" marginheight="0" marginwidth="0" scrolling="no" src="http://maps.google.de/?q=Stadion Narodowy&ie=UTF8&hq=Stadion Narodowy&hnear=&t=m&ll=52.239443,21.045556&spn=0.00565,0.015407&z=15&output=embed" width="360"></iframe><br />
<small><a href="http://maps.google.de/?q=Stadion Narodowy&ie=UTF8&hq=Stadion Narodowy&hnear=&t=m&ll=52.239443,21.045556&spn=0.00565,0.015407&z=15&source=embed" style="color:#0000FF;text-align:left">Wyświetl większą mapę</a></small></div>

<div class="half left">
<p><em>Jeżeli chce zapisać sie na to wydarzenie kliknij w poniższy link. Daj znać innym że tam będziesz!.</em></p>

<p id="join"><?=model_load('eventsmodel','joinEvent','')?></p>
</div>
<a class="slider_nav_btn next_btn" href="<?=model_load('eventsmodel','navigator','')?>#opis">Next</a></div>
<!-- end event -->

<div class="section section_with_padding" id="opis">
<h2>Opis eventu</h2>

<p><em>Bilety na koncert amerykańskiej gwiazdy będzie można kupić za pośrednictwem sieci sprzedaży biletów Livenation, Eventim oraz w stacjonarnych punktach sprzedaży. Bilety na pierwszy dzień festiwalu, gdy zagra Beyonce wynoszą 189 zł, 219 zł, 249 zł, 319 zł i 649 zł.</em></p>

<p><em>Beyonce Knowles jest autorką takich hitów jak "Halo", "I was here" i "End Of Time". Amerykanka jest wokalistką R&B, aktorką i projektantką mody.</em></p>

<p><em>Urodziła się i dorastała w Houston. Jako dziecko brała udział w konkursach tanecznych i wokalnych, jednak sławę zyskała pod koniec lat 90., kiedy była liderką zespołu Destiny's Child.</em></p>

<p><em>Beyonce jest jedną z najczęściej nagradzanych artystek w historii Grammy, z 16 wyróżnieniami (13 jako solowa wokalistka i trzy z grupą Destiny&rsquo;s Child). Piosenkarka skończyła niedawno 30 lat. Jest partnerką Jay'a Z, z którym ma córkę.</em></p>

<p><em>Występ w Warszawie Beyonce potwierdziła na swojej oficjalnej stronie. Artystka zagra na Stadionie Narodowym 25 maja. Jej koncert odbędzie się w ramach Orange Warsaw Festival. </em></p>
<a class="slider_nav_btn home_btn" href="<?=model_load('eventsmodel','navigator','')?>#event">home</a> <a class="slider_nav_btn previous_btn" href="<?=model_load('eventsmodel','navigator','')?>#event">Previous</a> <a class="slider_nav_btn next_btn" href="<?=model_load('eventsmodel','navigator','')?>#gallery">Next</a></div>
<!-- end opis -->

<div class="section" id="gallery">
<div class="box" id="home_box">
<h2>Galeria</h2>
</div>

<div class="box no_mr" id="home_gallery"><a href="kfm-1.4.7/uploads/beyonce/b1.jpg" rel="lightbox[gallery]"><img alt="image 1" height="152" src="kfm-1.4.7/uploads/beyonce/b1.jpg" width="152" /></a> <a href="kfm-1.4.7/uploads/beyonce/b2.jpg" rel="lightbox[gallery]"><img alt="image 2" height="152" src="kfm-1.4.7/uploads/beyonce/b2.jpg" width="152" /></a> <a class="no_mr" href="kfm-1.4.7/uploads/beyonce/b3.jpg" rel="lightbox[gallery]"><img alt="image 3" height="152" src="kfm-1.4.7/uploads/beyonce/b3.jpg" width="152" /></a> <a href="kfm-1.4.7/uploads/beyonce/b4.jpg" rel="lightbox[gallery]"><img alt="image 4" height="152" src="kfm-1.4.7/uploads/beyonce/b4.jpg" width="152" /></a> <a href="kfm-1.4.7/uploads/beyonce/b5.jpg" rel="lightbox[gallery]"><img alt="image 5" height="152" src="kfm-1.4.7/uploads/beyonce/b5.jpg" width="152" /></a> <a class="no_mr" href="kfm-1.4.7/uploads/beyonce/b6.jpg" rel="lightbox[gallery]"><img alt="image 6" height="152" src="kfm-1.4.7/uploads/beyonce/b6.jpg" width="152" /></a></div>
<a class="slider_nav_btn home_btn" href="<?=model_load('eventsmodel','navigator','')?>#event">home</a> <a class="slider_nav_btn previous_btn" href="<?=model_load('eventsmodel','navigator','')?>#opis">Previous</a> <a class="slider_nav_btn next_btn" href="<?=model_load('eventsmodel','navigator','')?>#movie">Next</a></div>
<!-- end gallery -->

<div class="section section_with_padding" id="movie">
<h2>Filmy!</h2>

<div class="img_border img_fl"><iframe allowfullscreen="" frameborder="0" height="200" src="http://www.youtube.com/embed/vIuRrG-ZCDY" width="360"></iframe></div>

<div class="half left">
<p><em>Zobacz film prezentujący poprzedni koncert Beyonce! .</em></p>

<p><em>"I AM...YOURS. An Intimate Performance at Wynn Las Vegas" to występ Beyonce, jakiego jeszcze nie widzieliście. Nagrany w Las Vegas koncert jednej z najpopularniejszych obecnie wokalistek na świecie.</em></p>
</div>

<div class="clear h2">&nbsp;</div>

<div class="img_border img_fl"><iframe allowfullscreen="" frameborder="0" height="200" src="http://www.youtube.com/embed/gAHf7YRTLzI" width="360"></iframe></div>

<div class="half left">
<p><em>W koncert wplecione są też elementy biograficzne i ujęcia 'zza kulis', dające wrażenie osobistego uczestnictwa w tym niesamowitym wydarzeniu, koncercie oraz całej światowej trasie koncertowej 'I Am... Yours'.</em></p>

<p><em>Wykonawca: Beyonce,Tytuł: I Am...Yours. An Intimate Performance At Wynn Las Vegas,Data koncertu: 17 grudnia 2009 (czwartek).</em></p>
</div>
<a class="slider_nav_btn home_btn" href="<?=model_load('eventsmodel','navigator','')?>#event">home</a> <a class="slider_nav_btn previous_btn" href="<?=model_load('eventsmodel','navigator','')?>#gallery">Previous</a> <a class="slider_nav_btn next_btn" href="<?=model_load('eventsmodel','navigator','')?>#other">Next</a></div>
<!-- END movie-->

<div class="section section_with_padding" id="other">
<h2>Zobacz inne wydarzenia z tego miasta!</h2>

<div class="img_border img_fl"><img alt="image" height="160" src="application/media/images/templatemo_image_04.jpg" width="360" /></div>

<div class="half right">
<div id="citylist">
<ul class="list_bullet"><?=model_load('eventsmodel','showCityEvent','')?>
</ul>
</div>
</div>

<div class="clear h40">&nbsp;</div>

<div class="clear">&nbsp;</div>

<div id="contact_form">
<form action="events/comments" id="form" method="post"><label for="text">Komentarz:</label><textarea cols="0" id="text" name="komentarz" rows="0">Tu wpisz swój komentarz</textarea><br />
<input name="controller" type="hidden" value="<?=model_load('eventsmodel','navigator','')?>" /> <input class="submit_btn float_l" name="Prześlij" type="submit" />&nbsp;</form>
</div>

<p id="comments">Komentarze użytkowników</p>
&nbsp;

<div id="combox"><?=model_load('eventsmodel','drawCommentList','')?></div>

<div class="half left">&nbsp;</div>
<a class="slider_nav_btn home_btn" href="<?=model_load('eventsmodel','navigator','')?>#event">home</a> <a class="slider_nav_btn previous_btn" href="<?=model_load('eventsmodel','navigator','')?>#movie">Previous</a></div>
<!-- END other --></div>
</div>
</body>

</html>