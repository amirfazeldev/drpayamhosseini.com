jQuery(document).ready(function($) {  

	$(window).scroll(function(){  
		var scrollTop = $(window).scrollTop();
		
			if (scrollTop > 80) {  
				$('.header').addClass('minheader'); 			
				 
			} else if (scrollTop < 80){  
				$('.header').removeClass('minheader');
				
			} 
		
	});
});