jQuery(document).ready(function($) {  

	/* Stick navigation to the top of the page */
	var stickyNavTop = $('.nav').offset().top; 

	$(window).scroll(function(){  
		var scrollTop = $(window).scrollTop();  

		if (scrollTop > stickyNavTop) {   
			$('.nav').addClass('sticky-header'); 
			$('.header').addClass('shifted');
			// $('.menu').css("background-color", "yellow");
			//$('.logo').css("margin-top", "-50");

			$('.logo').addClass('logo2');
			//$('.a-menu a').addClass('a-menua');
		} else {  
			$('.nav').removeClass('sticky-header');   
			$('.header').removeClass('shifted');
			//$('.logo').css("margin-top", "-90");

			$('.logo').removeClass('logo2');
			//$('.a-menu a').removeClass('a-menua');
		}

	});

});