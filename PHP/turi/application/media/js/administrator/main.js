/* ###

:: APP CONTROLLER :: MAKE IMAGE DIR RELATIVE :: images/ ::

### */

$(document).ajaxStart(showUI).ajaxStop($.unblockUI);
        
function showUI()
{
    $.blockUI({
            message: '<h1>Trwa przetwarzanie... Czekaj!</h1>',
            css: { 
                    border: 'none', 
                    padding: '15px',
                    backgroundColor: '#000', 
                    '-webkit-border-radius': '10px', 
                    '-moz-border-radius': '10px', 
                    opacity: .5, 
                    color: '#fff' 
                }
        });
}

$(function() {

    $(".clearBtn").click(function() {
        var cel = $(this).attr("alt");
        if(cel !== undefined)
        {
            $("." + cel).val("");
        }
    });
    
    $(".remIdButton").live("click", function() {
        
        // Pobranie wartości z nazwy ostatniego input'a
        var currId = $("td.idTranslationInput input").last().attr("name");
        // Ekstrakcja wartości liczbowej
        currId = currId.substr(2);
        
        $("td.idTranslationInput div.id"+currId).remove();
    });
    
    $(".addIdButton").click(function() {
        
        // Pobranie wartości z nazwy ostatniego input'a
        var currId = $("td.idTranslationInput input").last().attr("name");
        // Ekstrakcja wartości liczbowej
        currId = currId.substr(2);
        nextId = parseInt(currId)+1;
        
        $("td.idTranslationInput").append("<div class=\"id"+(nextId)+"\"><input type=\"text\" name=\"id"+(nextId)+"\" value=\"\" /><a href=\"javascript:void(0);\" class=\"remIdButton\"><img src=\"application/media/images/remove.png\" alt=\"REM\" /></a></div>");
    });
    
    $(".remLangButton").live("click", function() {
        
        // Pobranie wartości z nazwy ostatniego input'a
        var currId = $("td.idLangInput input").last().attr("name");
        // Ekstrakcja wartości liczbowej
        currId = currId.substr(4);
        
        $("td.idLangInput div.lang"+currId).remove();
    });
    
    $(".addLangButton").click(function() {
        
        // Pobranie wartości z nazwy ostatniego input'a
        var currId = $("td.idLangInput input").last().attr("name");
        // Ekstrakcja wartości liczbowej
        currId = currId.substr(4);
        nextId = parseInt(currId)+1;
        
        $("td.idLangInput").append("<div class=\"lang"+(nextId)+"\"><input type=\"text\" name=\"lang"+(nextId)+"\" value=\"\" /><a href=\"javascript:void(0);\" class=\"remLangButton\"><img src=\"application/media/images/remove.png\" alt=\"REM\" /></a></div>");
    });
    
    // Ajaxowe zapisanie formy
    
    $(".TC_formSaverBtn").click(function() {
        
        $.ajax({
            type: "POST",
            url: "application/media/_external/translation.php",
            processdata: false,
            data: "checkTr=true&name="+$("#nameOftranslation").val(),
            success: function(data)
            {
                if(data == "true")
                {
                    document.translationForm.submit();
                }
                else
                {
                    alert("Wystąpił błąd podczas sprawdzania poprawności wiersza \"Nazwa\". Możliwe, że taka nazwa istnieje w bazie danych.");
                }
                
            }	            
       	});
        
    });

});

function addNewtranslationID(tablename, columnname)//dodanie do tabeli kolumny z tłumaczeniami
{
	var newId = prompt("Czy zaproponowana nazwa ID jest wg. Ciebie OK?", columnname);
	if(newId != null && newId != "")
	{
		addNewtranslationID_db(tablename, newId);
	}
}

function addNewtranslationID_db(tablename, columnname)
{
	$.ajax({
        type: "POST",
        url: "application/media/_external/translation.php",
        processdata: false,
        data: "addNewID=true&tablename="+tablename+"&columnname="+columnname,
        success: function(data)
        {
            if(data == "true")
            {
                alert("Wystąpił błąd podczas dodawania nowego ID tłumaczeń!");
            }
            else
            {
            	window.location.reload();
                
            }
            
        }	            
   	});
}

function saveAllTranslations(obj, loc)
{
	var res = "";
	$(obj).each(function() {
		res += $(this).attr("name") + "=" + getCode($(this).attr("id")) + "&";
	});
	
	n = res.lastIndexOf("&");
	res = res.substr(0, n);
	
	db = loc.split(";");
	
	$.ajax({
        type: "POST",
        url: "application/media/_external/translation.php",
        processdata: false,
        data: "editID=true&tablename="+db[0]+"&columnname="+db[1]+"&"+res,
        success: function(data)
        {
                if(data == "true")
                {
                     alert("Wystąpił błąd podczas zapisywania tłumaczenia");
                }
                else
                {
                    window.location.reload();
                }      
        }	            
   	});
}

function removeTranslation(tablename)
{
	var conf = confirm("Czy na pewno chcesz usunąć całe tłumaczenie "+tablename.substr(3).replace("_", "/")+" ?");
	if(conf)
	{
		$.ajax({
            type: "POST",
            url: "application/media/_external/translation.php",
            processdata: false,
            data: "removeTr=true&tablename="+tablename,
            success: function(data)
            {
                if(data == "true")
                {
                     alert("Wystąpił błąd podczas usuwania tłumaczenia");
                }
                else
                {
                    window.location.reload();
                }
            }	            
       	});
	}
}


function addNewPage(beginInfo)
{
	var newId = prompt(beginInfo + "Wprowadź nazwę nowej strony.");
	var pattern = /^[A-Za-z]+/g;
	var test = pattern.test(newId);
	if(test)
	{
		doAddNewPage(newId);
	}
	else if(!test)
	{
		addNewPage("Wpisana nazwa strony jest niepoprawna. Wpisz ją ponownie.\n");
	}
}

function doAddNewPage(pagename)
{
	if(pagename != null)
	{
		$.ajax({
                type: "POST",
                url: "application/media/_external/administrator.php",
                processdata: false,
                data: "addNewPage=true&pagename="+pagename,
                success: function(data)
                {
                    if(data == "true")
                    {
                        window.location.reload();
                    }
                    else
                    {
                        alert(data);
                    }
                }	            
           	});
	}
}

function addNewNews(beginInfo)
{
	var newId = prompt(beginInfo + "Wprowadź nazwę nowej strony.");
	var pattern = /^[A-Za-z]+/g;
	var test = pattern.test(newId);
	if(test)
	{
		doAddNewNews(newId);
	}
	else if(!test)
	{
		addNewNews("Wpisana nazwa strony jest niepoprawna. Wpisz ją ponownie.\n");
	}
}

function doAddNewNews(pagename)
{
	if(pagename != null)
	{
		$.ajax({
                type: "POST",
                url: "application/media/_external/administrator.php",
                processdata: false,
                data: "addNewNews=true&pagename="+pagename,
                success: function(data)
                {
                    if(data == "true")
                    {
                        window.location.reload();
                    }
                    else
                    {
                        alert(data);
                    }
                }	            
           	});
	}
}

function removePage(pagename)
{
	var ask = confirm("Czy napewno chcesz usunąć stronę '" +pagename+ "'?");
	if(ask)
	{
		$.ajax({
                type: "POST",
                url: "application/media/_external/administrator.php",
                processdata: false,
                data: "removePage=true&pagename="+pagename,
                success: function(data)
                {
                    if(data == "true")
                    {
                        window.location.reload();
                    }
                    else
                    {
                        alert(data);
                    }
                }	            
           	});
	}
}

function saveMethod(controller, method)
{
	var module = "";
	var model = "";
	var hook = "";
	//sprawdza jakie checkboxy zostały zaznaczone
	$("input[name='module'][type='checkbox']:checked").each(function() {
        module = module + $(this).val() + ", ";
    });
    
    module = module.substr(0, module.length - 2);
    
    $("input[name='model'][type='checkbox']:checked").each(function() {
        model = model + $(this).val() + ", ";
    });
    
    model = model.substr(0, model.length - 2);
    
    $("input[name='hook'][type='checkbox']:checked").each(function() {
        hook = hook + $(this).val() + ", ";
    });
    
    hook = hook.substr(0, hook.length - 2);
    
    if(module != undefined && module != "")//czy moduł nie jest undefined
    {
    	$.ajax({
            type: "POST",
            url: "application/media/_external/administrator.php",
            processdata: false,
            data: "saveMethod=true&controller="+controller+"&method="+method+"&main="+module+"&model="+model+"&hook="+hook,
            success: function(data)
            {
                if(data == "true")
                {
                    window.location.reload();
                }
                else
                {
                    alert(data);
                }
            }	            
       	});
    }
}

function saveMethodSource(controller, method)
{
	var ask = confirm("Czy chcesz zapisać zmiany w pliku " + controller + ".php ?");
	if(ask)
	{
		var code = getCode();
		$.ajax({
            type: "POST",
            url: "application/media/_external/administrator.php",
            processdata: false,
            data: "saveMethodSource=true&controller="+controller+"&method="+method+"&code="+code,
            success: function(data)
            {
                if(data == "true")
                {
                    window.location.reload();
                }
                else
                {
                    alert(data);
                }
            }	            
       	});
	}
}

function htmlspecialchars_decode (string, quote_style) {//dekuduje znaki specjalne dzieki czemu nie będzie błedów przy zapisywaniu widoku, działa jak wbudowana funkcja w php
    // http://kevin.vanzonneveld.net
    // +   original by: Mirek Slugen
    // +   improved by: Kevin van Zonneveld (http://kevin.vanzonneveld.net)
    // +   bugfixed by: Mateusz "loonquawl" Zalega
    var optTemp = 0,
        i = 0,
        noquotes = false;
    if (typeof quote_style === 'undefined') {
        quote_style = 2;
    }
    string = string.toString().replace(/&lt;/g, '<').replace(/&gt;/g, '>');
    var OPTS = {
        'ENT_NOQUOTES': 0,
        'ENT_HTML_QUOTE_SINGLE': 1,
        'ENT_HTML_QUOTE_DOUBLE': 2,
        'ENT_COMPAT': 2,
        'ENT_QUOTES': 3,
        'ENT_IGNORE': 4
    };
    if (quote_style === 0) {
        noquotes = true;
    }
    if (typeof quote_style !== 'number') { // Allow for a single string or an array of string flags
        quote_style = [].concat(quote_style);
        for (i = 0; i < quote_style.length; i++) {
            // Resolve string input to bitwise e.g. 'PATHINFO_EXTENSION' becomes 4
            if (OPTS[quote_style[i]] === 0) {
                noquotes = true;
            } else if (OPTS[quote_style[i]]) {
                optTemp = optTemp | OPTS[quote_style[i]];
            }
        }
        quote_style = optTemp;
    }
    if (quote_style & OPTS.ENT_HTML_QUOTE_SINGLE) {
        string = string.replace(/&#0*39;/g, "'"); // PHP doesn't currently escape if more than one 0, but it should
        // string = string.replace(/&apos;|&#x0*27;/g, "'"); // This would also be useful here, but not a part of PHP
    }
    if (!noquotes) {
        string = string.replace(/&quot;/g, '"');
    }
    // Put this in last place to avoid escape being double-decoded
    string = string.replace(/&amp;/g, '&');

    return string;
}

function saveUserPage(controller, method)//zapisuje zmieniony widok 
{
	var ask = confirm("Czy chcesz zapisać wprowadzone zmiany ?");
	if(ask)
	{
		CKEDITOR.instances['editor1'].updateElement();
        var content = CKEDITOR.instances['editor1'].getData();
        content = htmlspecialchars_decode(content);
        content = content.replace("&nbsp;", " ");
        
        var title = $("#pageTitle").val();
        
        $.ajax({
            type: "POST",
            url: "application/media/_external/administrator.php",
            processdata: true,
            data: "saveUserPage=true&controller="+controller+"&method="+method+"&content="+escape(content)+"&pageTitle="+title,
            dataType: 'html',
            success: function(data)
            {
                if(data == "true")
                {
                    window.location.reload();
                }
                else
                {
                    alert(data);
                }
            }	            
       	});
	}
}

function removeSelected(controller)//usuwanie zaznaczonym podstron z controlera
{
	var result = "";
	
	$("input[name='subpage'][type='checkbox']:checked").each(function() {
        result = result + $(this).val() + ", ";
    });
    
    result = result.substr(0, result.length - 2);
    
    if(result != undefined && result != "")
    {
    	var ask = confirm("Czy na pewno chcesz usunąć " + result + " ?");
    	if(ask)
    	{
    		$.ajax({
                type: "POST",
                url: "application/media/_external/administrator.php",
                processdata: false,
                data: "removeSubpage=true&controller="+controller+"&pages="+result,
                success: function(data)
                {
                    if(data == "true")
                    {
                        window.location.reload();
                    }
                    else
                    {
                        alert(data);
                    }
                }	            
           	});
    	}
    }
}

function addNewSubpage(controller)//dodanie nowej podstrony do kontroloera
{
	var name = prompt("Podaj nazwę dla nowej strony", '');
	if(name != null && name != "")
	{
		$.ajax({
            type: "POST",
            url: "application/media/_external/administrator.php",
            processdata: false,
            data: "addNewSubpage=true&controller="+controller+"&pagename="+name,
            success: function(data)
            {
                if(data == "true")
                {
                    window.location.reload();
                }
                else
                {
                    alert(data);
                }
            }	            
       	});
	}
}

function saveController(controller)
{
	var ask = confirm("Czy chcesz zapisać zmiany w pliku " + controller + ".php ?");
	if(ask)
	{
		var code = getCode();
        
        $.ajax({
            type: "POST",
            url: "application/media/_external/administrator.php",
            processdata: true,
            data: "saveController=true&controller="+controller+"&content="+code,
            dataType: 'html',
            success: function(data)
            {
                if(data == "true")
                {
                    window.location.reload();
                }
                else
                {
                    alert(data);
                }
            }	            
       	});
	}
}

function addNewModule()
{
	var name = prompt("Podaj nazwę nowego modułu", '');
	if(name != null && name != "")
	{
		$.ajax({
            type: "POST",
            url: "application/media/_external/administrator.php",
            processdata: false,
            data: "addNewModule=true&module="+name,
            success: function(data)
            {
                if(data == "true")
                {
                    window.location.reload();
                }
                else
                {
                    alert(data);
                }
            }	            
       	});
	}
}

function saveModule(module)
{
	var ask = confirm("Czy chcesz zapisać zmiany w pliku " + module + ".php ?");
	if(ask)
	{
		var code = getCode();
		
		$.ajax({
            type: "POST",
            url: "application/media/_external/administrator.php",
            processdata: false,
            data: "saveModule=true&module="+module+"&content="+code,
            success: function(data)
            {
                if(data == "true")
                {
                    window.location.reload();
                }
                else
                {
                    alert(data);
                }
            }	            
       	});
	}
}

function removeModule(module)
{
	var ask = confirm("Czy napewno chcesz usunąć moduł '" +module+ "'?");
	if(ask)
	{
		$.ajax({
            type: "POST",
            url: "application/media/_external/administrator.php",
            processdata: false,
            data: "removeModule=true&module="+module,
            success: function(data)
            {
                if(data == "true")
                {
                    window.location.reload();
                }
                else
                {
                    alert(data);
                }
            }	            
       	});
	}
}
function saveUsers(id)
{
   var r = "";
   var rid = "";
   
   if(id == undefined || id == "")
   {
      r = "Czy chcesz utworzyć nowego użytkownika ?";
      rid = "new";
   }
   else
   {
      r = "Czy chcesz zapisać wprowadzone zmiany ?";
      rid = id;
   }
   
   var ask = confirm(r);
   if(ask)
   {        
      var fullname = $("#userFullname").val();
        var username = $("#userUsername").val();
        var password = $("#userPassword").val();
      var mail = $("#userMail").val();
      var birthdate = $("#userBirthdate").val();
        
        $.ajax({
            type: "POST",
            url: "application/media/_external/administrator.php",
            processdata: true,
            data: "saveUsers=" + rid + "&fullname=" + fullname + "&username=" + username + "&password=" + password + "&mail=" + mail + "&birthdate=" + birthdate,
            dataType: 'html',
            success: function(data)
            {
                if(data == "true")
                {
                    window.location.replace("administrator/users");
                }
                else
                {
                    alert(data);
                }
            }               
          });
   }
}
function removeUser(id)
{
   var ask = confirm("Czy na pewno chcesz usunąć tego użytkownika ?");
   if(ask)
   {
      $.ajax({
            type: "POST",
            url: "application/media/_external/administrator.php",
            processdata: true,
            data: "removeUser=true&id=" + id,
            dataType: 'html',
            success: function(data)
            {
                if(data == "true")
                {
                    window.location.reload();
                }
                else
                {
                    alert(data);
                }
            }               
          });
   }
}


function saveNews(id)
{
	var q = "";
	var uid = "";
	
	if(id == undefined || id == "")
	{
		q = "Czy chcesz utworzyć nowe wydarzenie o podanej treści ?";
		uid = "new";
	}
	else
	{
		q = "Czy chcesz zapisać wprowadzone zmiany w wydarzeniu ?";
		uid = id;
	}
	
	var ask = confirm(q);
	if(ask)
	{
		CKEDITOR.instances['editor1'].updateElement();
        var content = CKEDITOR.instances['editor1'].getData();
        content = htmlspecialchars_decode(content);
        content = content.replace("&nbsp;", " ");
        
        var title = $("#artTitle").val();
        var city = $("#artCity").val();
        var date = $("#artDate").val();
        var author = $("#artAuthor").val();
        
        $.ajax({
            type: "POST",
            url: "application/media/_external/administrator.php",
            processdata: true,
            data: "saveNews=" + uid + "&title=" + title + "&city=" + city + "&date=" + date + "&author=" + author + "&text=" + escape(content),
            dataType: 'html',
            success: function(data)
            {
                if(data == "true")
                {
                    window.location.replace("administrator/news");
                }
                else
                {
                    alert(data);
                }
            }	            
       	});
	}
}

function removeNews(id)
{
	var ask = confirm("Czy na pewno chcesz usunąć to wydarzenie ?");
	if(ask)
	{
		$.ajax({
            type: "POST",
            url: "application/media/_external/administrator.php",
            processdata: true,
            data: "removeNews=true&id=" + id,
            dataType: 'html',
            success: function(data)
            {
                if(data == "true")
                {
                    window.location.reload();
                }
                else
                {
                    alert(data);
                }
            }	            
       	});
	}
}

























