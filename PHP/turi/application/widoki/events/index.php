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
  <div class="section section_with_padding" id="event"> 
            <h2>EVENT</h2>
            <div class="img_border img_fl">
                <img src="kfm-1.4.7/uploads/gallery/krakow-gal.jpg" alt="image" width="360" height="160" />	
            </div>
            <div class="half right">
                <ul class="list_bullet">
                    <li>Maecenas ac odio ipsum donec cursus</li>
                    <li>Fusce risus tortor, interdum</li>
                    <li>Proin facilisis ullamcorper</li>
                    <li>Sed vel justo quis ligula</li>
                    <li>Ut tristique sagittis arcu</li>
                    <li>Maecenas ac odio ipsum donec cursus</li>
                    <li>Fusce risus tortor, interdum</li>
                 </ul>
            </div>
            <div class="clear h20"></div>
            <div class="img_nom img_border" id="location"><span></span>
                
                <iframe width="360" height="215" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="http://maps.google.com/maps?f=q&amp;source=s_q&amp;hl=en&amp;geocode=&amp;q=Central+Park,+New+York,+NY,+USA&amp;aq=0&amp;sll=14.093957,1.318359&amp;sspn=69.699334,135.263672&amp;vpsrc=6&amp;ie=UTF8&amp;hq=Central+Park,+New+York,+NY,+USA&amp;ll=40.778265,-73.96988&amp;spn=0.033797,0.06403&amp;t=m&amp;output=embed"></iframe>
                
            </div>
			<div class="half left">                
            	<p><em>Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Nam mauris ipsum, pulvinar sit amet varius at, placerat ut felis.</em></p>
            	<p id="join"><?=model_load('eventsmodel','joinEvent','')?></p>
            </div>

            <a href="events#opis"  #opis" class="slider_nav_btn next_btn">Next</a> 

        </div>

        <!-- end event -->
        <div class="section section_with_padding" id="opis"> 
            <h2>Opis eventu</h2>
            <p><em>Aliquam venenatis, quam a semper blandit, lectus mi convallis orci, ut dictum ante leo non leo. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Mauris placerat, urna in gravida rhoncus, mi elit luctus nibh, a luctus erat elit vel quam. </em></p>
                    <p><em>Aliquam venenatis, quam a semper blandit, lectus mi convallis orci, ut dictum ante leo non leo. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Mauris placerat, urna in gravida rhoncus, mi elit luctus nibh, a luctus erat elit vel quam. </em></p>
            <p><em>Aliquam venenatis, quam a semper blandit, lectus mi convallis orci, ut dictum ante leo non leo. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Mauris placerat, urna in gravida rhoncus, mi elit luctus nibh, a luctus erat elit vel quam. </em></p>
            <p><em>Aliquam venenatis, quam a semper blandit, lectus mi convallis orci, ut dictum ante leo non leo. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Mauris placerat, urna in gravida rhoncus, mi elit luctus nibh, a luctus erat elit vel quam. </em></p>
            <p><em>Aliquam venenatis, quam a semper blandit, lectus mi convallis orci, ut dictum ante leo non leo. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Mauris placerat, urna in gravida rhoncus, mi elit luctus nibh, a luctus erat elit vel quam. </em></p>
            <p><em>Aliquam venenatis, quam a semper blandit, lectus mi convallis orci, ut dictum ante leo non leo. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Mauris placerat, urna in gravida rhoncus, mi elit luctus nibh, a luctus erat elit vel quam. </em></p>
            <p><em>Aliquam venenatis, quam a semper blandit, lectus mi convallis orci, ut dictum ante leo non leo. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Mauris placerat, urna in gravida rhoncus, mi elit luctus nibh, a luctus erat elit vel quam. </em></p>
            <p><em>Aliquam venenatis, quam a semper blandit, lectus mi convallis orci, ut dictum ante leo non leo. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Mauris placerat, urna in gravida rhoncus, mi elit luctus nibh, a luctus erat elit vel quam. </em></p>
            <p><em>Aliquam venenatis, quam a semper blandit, lectus mi convallis orci, ut dictum ante leo non leo. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Mauris placerat, urna in gravida rhoncus, mi elit luctus nibh, a luctus erat elit vel quam. </em></p>
            <p><em>Aliquam venenatis, quam a semper blandit, lectus mi convallis orci, ut dictum ante leo non leo. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Mauris placerat, urna in gravida rhoncus, mi elit luctus nibh, a luctus erat elit vel quam. </em></p>

        
         <a href="events#event" class="slider_nav_btn home_btn">home</a> 
         <a href="events#event" class="slider_nav_btn previous_btn">Previous</a>
         <a href="events#gallery" class="slider_nav_btn next_btn">Next</a>
         </div>
        <!-- end opis -->
        <div id="gallery" class="section">
        	
			<div id="home_box" class="box">
           	  <h2>Galeria</h2>
            </div>
            
            <div id="home_gallery" class="box no_mr">
                <a href="kfm-1.4.7/uploads/gallery/warszawa.jpg" rel="lightbox[gallery]"><img src="kfm-1.4.7/uploads/gallery/krakow.jpg" alt="image 1" width='152' height='152'/></a>
                <a href="kfm-1.4.7/uploads/gallery/poznan.jpg" rel="lightbox[gallery]"><img src="kfm-1.4.7/uploads/gallery/katowice.jpg" alt="image 2" width='152' height='152'/></a>
                <a href="kfm-1.4.7/uploads/gallery/gdansk.jpg" rel="lightbox[gallery]" class="no_mr"><img src="kfm-1.4.7/uploads/gallery/warszawa.jpg" alt="image 3" width='152' height='152'/></a>
                <a href="kfm-1.4.7/uploads/gallery/Polska.jpg" rel="lightbox[gallery]"><img src="kfm-1.4.7/uploads/gallery/poznan.jpg" alt="image 4" width='152' height='152'/></a>
                <a href="kfm-1.4.7/uploads/gallery/katowice.jpg" rel="lightbox[gallery]"><img src="kfm-1.4.7/uploads/gallery/gdansk.jpg" alt="image 5" width='152' height='152'/></a>
                <a href="kfm-1.4.7/uploads/gallery/gdansk.jpg" rel="lightbox[gallery]" class="no_mr"><img src="kfm-1.4.7/uploads/gallery/Polska.jpg" alt="image 6" width='152' height='152'/></a>
            </div>
            
            <a href="events#event" class="slider_nav_btn home_btn">home</a> 
            <a href="events#opis" class="slider_nav_btn previous_btn">Previous</a>
            <a href="events#movie" class="slider_nav_btn next_btn">Next</a>
        </div>
        <!-- end gallery -->
        <div class="section section_with_padding" id="movie"> 
            <h2>Filmy!</h2>
            <div class="img_border img_fl">
                <iframe width="360" height="200" src="http://www.youtube.com/embed/vIuRrG-ZCDY" frameborder="0" allowfullscreen></iframe>	
            </div>
            <div class="half left">
                <p><em>Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Nam mauris ipsum, pulvinar sit amet varius at, placerat ut felis.</em></p>
            	<p><em>Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Nam mauris ipsum, pulvinar sit amet varius at, placerat ut felis.</em></p>

            </div>
            <div class="clear h2"></div>
            <div class="img_border img_fl"><span></span>
                
				<iframe width="360" height="200" src="http://www.youtube.com/embed/gAHf7YRTLzI" frameborder="0" allowfullscreen></iframe>
                
            </div>
			<div class="half left">                
            	<p><em>Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Nam mauris ipsum, pulvinar sit amet varius at, placerat ut felis.</em></p>
            	<p><em>Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Nam mauris ipsum, pulvinar sit amet varius at, placerat ut felis.</em></p>

            </div>

            <a href="events#event" class="slider_nav_btn home_btn">home</a> 
            <a href="events#gallery" class="slider_nav_btn previous_btn">Previous</a>
            <a href="events#other" class="slider_nav_btn next_btn">Next</a>

        </div>
        <!-- END movie-->
         <div class="section section_with_padding" id="other"> 
            <h2>Zobacz inne wydarzenia z tego miasta!</h2>
            <div class="img_border img_fl">
                <img src="application/media/images/templatemo_image_04.jpg" alt="image" width="360" height="160" />	
            </div>
            <div class="half right">
                <ul class="list_bullet">
                    <?=model_load('eventsmodel','showCityEvent','')?>
                 </ul>
            </div>           
            <div class="clear h40"></div>
            <div class="clear"></div>
            <div class id="contact_form">
                <form id="form" action="events/comments"  method="post">
				<label for="text">Komentarz:</label><textarea id="text" name="komentarz" cols="0" rows="0">Tu wpisz swój komentarz</textarea><br />
				<input type="submit" class="submit_btn float_l" name="Prześlij"/>
			</form> 	
            </div>
         
            <p id="comments">Komentarze użytkowników</p><br />
            		<?=model_load('eventsmodel','drawCommentList','')?>
			<div class="half left">
			          
            </div>

            <a href="events#event" class="slider_nav_btn home_btn">home</a> 
            <a href="events#movie" class="slider_nav_btn previous_btn">Previous</a>
            

        </div>
   </div>
   <!-- END other -->
   
</div>    
</body>

</html>