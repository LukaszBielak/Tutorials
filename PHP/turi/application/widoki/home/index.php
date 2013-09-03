<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="pl" lang="pl">
<head>
<?=add_title("CityEvent")?>
<?=add_metatags()?>
<?=add_basehref()?>

<?=stylesheet_load('logpanel.css, template_style.css')?>
<?=javascript_load('jquery-1.9.1.js,main.js, jquery.localscroll-min.js, jquery.scrollTo-min.js, init.js')?>
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
		<div id="home" class="section">
        	
			<div id="home_about" class="box">
				<?=dodaj_tlumaczenie('home_about')?>
            </div>
            
            <div id="home_gallery" class="box no_mr">
            	<?=model_load('homemodel','drawCitiesList','')?>
            </div>
            
            <div class="box home_box1 color1">
            	<?=model_load('homemodel','eventList','')?>
            </div>
            
            <div class="box home_box1 color2">
	            <?=model_load('homemodel','logout','')?>
            </div>
            
            <div class="box home_box2 color3">
            	<div id="social_links">
                    <a href="#"><img src="application/media/images/facebook.png" alt="Facebook" /></a>
                    <a href="#"><img src="application/media/images/flickr.png" alt="Flickr" /></a>
                    <a href="#"><img src="application/media/images/twitter.png" alt="Twitter" /></a>
                    <a href="#"><img src="application/media/images/youtube.png" alt="Youtube" /></a>
                    <a href="#"><img src="application/media/images/vimeo.png" alt="Vimeo" /></a>
              <div class="clear h20"></div>
                    <h3>Social</h3>
              </div>	
            </div>
            
            <div class="box home_box1 color4 no_mr">
            	<?=model_load('homemodel','contact','')?>
            </div>
               
        </div> <!-- END of home -->
        
        <div class="section section_with_padding" id="eventlist"> 
            <h2>Wydarzenia na które jesteś zapisany:</h2>
            <div class="img_border img_fl">
                <img src="application/media/images/templatemo_image_03.jpg" alt="image" width="360" height="160" />	
            </div>
            <div class="half right">
            	<div id="citylist" class="homelist">
                <ul class="list_bullet">
                    <?=model_load('homemodel','drawUserEventsList','')?>
                 </ul>
            </div>
            </div>          
            <div class="clear h40"></div>
            
			<div class="half left">                
            	<p><em>Wszystkie wydarzenia na które sie zapisałeś znajdziesz obok!.</em></p>
            	<p>Zapisałeś sie na wydarzenie na które bardzo chciałbyś iść ale w morzu innych ciekawych wydarzeń zapomniałeś o nim? Nic straconego! W tym miejsu znajdziesz liste odnośników do wydarzeń na które jesteś zapisany!. </p>
            </div>

            <a href="#home" class="slider_nav_btn home_btn">home</a> 
            <a href="#contact" class="slider_nav_btn next_btn">Next</a> 

        </div> <!-- END of eventlist --> 
        
        <div class="section section_with_padding" id="contact"> 
            <h2>Contact</h2> 
            <div class="half left">
                <h4>Formularz kontaktowy</h4>
                <p>Potrzebujesz sie z nami skontaktować? Wypełnij prosty formularz kontaktowy. Szybko się z Tobą skontaktujemy! Zadzwonimy lub mailowo prześlemy odpowiedz.</p>
                <div id="contact_form">
                    <form method="post" name="contact" action="#contact">
                        <div class="left">
                            <label for="author">Imie i nazwisko:</label> <input name="author" type="text" class="input_field" id="author" maxlength="40" />
                        </div>
                        <div class="right">                           
                            <label for="email">Email:</label> <input name="email" type="text" class="input_field" id="email" maxlength="40" />
                        </div>
                        <div class="clear"></div>
                        <label for="text">Wiadomość:</label> <textarea id="text" name="text" rows="0" cols="0"></textarea>
                        <input type="submit" class="submit_btn float_l" name="submit" id="submit" value="Send" />
                    </form>
                </div>
            </div>
            
            <div class="half right">
                <h4>Dane teleadresowe</h4>
                CityEvent S. C.<br />
                40-873 Katowice, <br />
                ul. Tysiąclecia  1<br />                
          		<strong>Email: info@cityevent.pl</strong><br />
                
                <div class="clear h20"></div>
                <div class="img_nom img_border"><span></span>
                
				<iframe width="320" height="240" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="https://maps.google.pl/maps?f=q&amp;source=s_q&amp;hl=pl&amp;geocode=&amp;q=katowice,+tysi%C4%85clecia&amp;aq=&amp;sll=50.275902,18.98276&amp;sspn=0.001944,0.005284&amp;t=h&amp;ie=UTF8&amp;hq=&amp;hnear=Tysi%C4%85clecia,+Katowice,+%C5%9Bl%C4%85skie&amp;ll=50.277602,18.977852&amp;spn=0.013164,0.027552&amp;z=14&amp;iwloc=A&amp;output=embed"></iframe><br /><small><a href="https://maps.google.pl/maps?f=q&amp;source=embed&amp;hl=pl&amp;geocode=&amp;q=katowice,+tysi%C4%85clecia&amp;aq=&amp;sll=50.275902,18.98276&amp;sspn=0.001944,0.005284&amp;t=h&amp;ie=UTF8&amp;hq=&amp;hnear=Tysi%C4%85clecia,+Katowice,+%C5%9Bl%C4%85skie&amp;ll=50.277602,18.977852&amp;spn=0.013164,0.027552&amp;z=14&amp;iwloc=A" style="color:#0000FF;text-align:left">Wyświetl większą mapę</a></small>                
            </div>
			<a href="#home" class="slider_nav_btn home_btn">home</a> 
            <a href="#eventlist" class="slider_nav_btn previous_btn">Previous</a>
             
        </div> 
    </div> 
</div>
</div>



</body>
</html>

