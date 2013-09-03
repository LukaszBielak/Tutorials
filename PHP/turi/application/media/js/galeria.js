/*
	GALERIA
	*/
	//$('#gallery .container .gallery').myLightBox();
		
	$.getJSON("features/service.php?action=getGalleryImages", function(data){
		var $photoGalleryContainer = $('#gallery .container .gallery').empty();
		var delay = 0;
		
		$.each(data, function(index, photoInfo){
			var $tmpTagA = $('<a>')
					.attr({
						'href': photoInfo['image'],
						'rel': photoInfo['gallery'],
						'class': 'loading',
						'title': photoInfo['alt']
					})
					.css({
						'margin-top': '-30px',
						'opacity': '0.0'
					});
					
			var $tmpTagImg = $('<img>')
					.attr({
						'src': 'images/ajax-loader.gif'
						//'alt': photoInfo['alt']
					})
					
			$photoGalleryContainer
					.append($tmpTagA.append($tmpTagImg));
					
			$tmpTagA.delay(delay+=300).animate({
				'opacity': 1.0,
				'margin-top': '-20px'
			}, "medium");
			
			var ImageObj = new Image();
			ImageObj.src = photoInfo['thumbnail'];
			ImageObj.onload = function(){
				$tmpTagA
					.removeClass('loading')
					.children('img')
					.attr('src', this.src)
			}
		})
		
		$('#gallery .container .gallery a').fancybox({
			transitionIn: 'elastic',
			transitionOut: 'elastic',
			titlePosition: 'over',
		});
	});
	
	$('#gallery .container .gallery a')
			.live('mouseenter', function(){
				if($(this).hasClass('loading')) return;
				
				$('<div/>')
					.css({
						"position": "absolute",
						"background": "#000000 url(images/zobacz-zdjecie.png) center center no-repeat",
						"width": $("img", this).css("width"),
						"height": $("img", this).css("height"),
						"margin-left": "+"+(parseInt($("img", this).css("padding-left"))+parseInt($("img", this).css("border-left-width")))+"px",
						"margin-top": "+"+(parseInt($("img", this).css("padding-top"))+parseInt($("img", this).css("border-top-width")))+"px",
						"opacity": "0.0"
					})
					.insertBefore($('img', this))
					.fadeTo("fast", 0.8);
					
				$(this).animate({
					'margin-top': '-30px'
				}, "fast");
			})
			.live('mouseleave', function(){
				if($(this).hasClass('loading')) return;
				
				$('div', this)
					.fadeTo('fast', 0.0, function(){
						$(this).remove();
					})
					
				$(this).animate({
					'margin-top': '-20px'
				}, "fast");
			})

	