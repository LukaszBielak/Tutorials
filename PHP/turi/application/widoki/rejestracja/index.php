<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="pl" lang="pl">

<head>

<?=add_metatags()?>

<?=add_title("Rejestracja nowego użytkownika")?>

<?=add_basehref()?>

<?=stylesheet_load('template_style.css, logpanel.css')?>

<?=javascript_load('jquery-1.9.1.js,jquery.validate.js,jquery.MetaData.js,main.js,main.register.js')?> 
    
<?=icon_load("pp_fav.ico")?>

</head>

<body>
 
<div id="header">
    <?=module_load('LOGINPANEL')?>
    <div id="lang-changer">Język witryny: <a href="javascript:void(0);" onclick="changeLangTo('pl');"><img src="<?=directory_images()?>pl.png" alt="PL" /></a><a href="javascript:void(0);" onclick="changeLangTo('en');"><img src="<?=directory_images()?>gb.png" alt="GB" /></a></div>
</div>
<div id="templatemo_header">
    <div id="site_title"><h1><a href="" title="CityEvents">CityEvents</a></h1></div>
</div>
<div id="templatemo_main">
    <div id="content">   		
        	
			<div id="home_about" class="box">
           	  <h2>Rejestracja</h2>
           	      <p>Załóż swoje konto w serwisie i dołącz do społeczności CityEvent.</p>
            </div>
 
                    
                        <form name="reg-form" id="reg-form" action="rejestracja/nowy" method="POST">
                    
                    <table class="objTable">
                        
                        <tbody>
                            
                            <tr>
                                <td><span class="star">*</span> Podaj imię:</td>
                                <td><input type="text" value="" name="name" class="required" minlength="3" maxlength="20" /></td>
                                <td></td>
                            </tr>
                            
                            <tr>
                                <td><span class="star">*</span> Podaj nazwisko:</td>
                                <td><input type="text" value="" name="surname" class="required" minlength="3" maxlength="25" /></td>
                                <td></td>
                            </tr>
                            
                            <tr>
                                <td><span class="star">*</span> Podaj nick:</td>
                                <td><input type="text" value="" name="nick" class="required" minlength="5" maxlength="25" /></td>
                                <td></td>
                            </tr>
                            
                            <tr>
                                <td><span class="star">*</span> Data urodzenia:</td>
                                <td><select name="day" class="birthdate day">
									<?=model_load('rejestracjamodel', 'getAllDays', '')?>
                                    </select>
                                    <select name="month" class="birthdate month">
                                            <option value="01">Styczeń</option>
                                            <option value="02">Luty</option>
                                            <option value="03">Marzec</option>
                                            <option value="04">Kwiecień</option>
                                            <option value="05">Maj</option>
                                            <option value="06">Czerwiec</option>
                                            <option value="07">Lipiec</option>
                                            <option value="08">Sierpień</option>
                                            <option value="09">Wrzesień</option>
                                            <option value="10">Październik</option>
                                            <option value="11">Listopad</option>
                                            <option value="12">Grudzień</option>
                                    </select>
                                    <select name="year" class="birthdate year">
									<?=model_load('rejestracjamodel', 'getAllYears', '')?>
                                    </select>
                                </td>
                                <td></td>
                            </tr>
                            
                            <tr>
                                <td><span class="star">*</span> Podaj hasło:</td>
                                <td><input type="text" value="" name="pass1" id="pass1" class="required" minlength="5" maxlength="50" /></td>
                                <td></td>
                            </tr>
                            
                            <tr>
                                <td><span class="star">*</span> Powtórz hasło:</td>
                                <td><input type="text" value="" name="pass2" id="pass2" class="required" minlength="5" maxlength="50" /></td>
                                <td></td>
                            </tr>
                            
                            <tr>
                                <td><span class="star">*</span> Twój e-mail:</td>
                                <td><input type="text" value="" name="mail" class="required email" /></td>
                                <td></td>
                            </tr>
                            
                        </tbody>
                        
                    </table>
                    
                       <br /><br />
                       
                       <input type="submit" name="submit-form" class="submit-form" value="Zarejestruj" />
                       <input type="reset" name="submit-form" class="reset-form" value="Reset" /><br class="clear" />
                       </form>
                       
                       <br /><br />
                    
                    </div>
                    </div>




</body>
</html>