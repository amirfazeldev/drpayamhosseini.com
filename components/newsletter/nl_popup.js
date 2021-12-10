
$(document).ready(function(){

	// on click of plus	
	$('.pop').on('click', function(e){
		hitbox('<div class="boxborder" id="project_hitbox"></div>', 450, 400 );
		var project_hitbox = $("#project_hitbox");
		project_hitbox.css( {'background-color':'#fff'} );
		
			project_hitbox.load("./components/newsletter/ajax.html");
			e.preventDefault();
	});

});

