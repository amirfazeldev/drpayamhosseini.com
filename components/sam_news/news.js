jQuery(document).ready(function($) {  

	$(window).scroll(function(){  
		var scrollTop = $(window).scrollTop();
		var newsdisplayl = $('.news_display_l').height();
		// console.log(scrollTop);
		// console.log(newsdisplayl);
		
			if (scrollTop > 120) {  
				$('.news_display_head').addClass('fix'); 			
				 
			} else if (scrollTop < 120){  
				$('.news_display_head ').removeClass('fix');				
			}
			if (newsdisplayl < scrollTop){  
				$('.news_display_head ').removeClass('fix');
				
			}  
		
	});
});