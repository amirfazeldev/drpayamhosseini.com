
$(document).ready(function($) {
	
	$('#cat_form_management .itgc_grid2 > form > input[type=text]').on('focus', function(){
		$(this).parent().find('input[type=text]').css({'width':'60px'});
		$(this).css({'width':'340px'});
	}).on('blur', function(){
		$(this).parent().find('input[type=text]').css({'width':''});
	});
	$('#cat_form_management #new.itgc_grid2 > form > input[type=text]').css({'width':'60px'});
	$('#cat_form_management #new.itgc_grid2 > form > input[type=text]').first().css({'width':'340px'});

	$('#cat_form_management .itgc_grid3 > form > input[type=text]').on('focus', function(){
		$(this).parent().find('input[type=text]').css({'width':'60px'});
		$(this).css({'width':'274.5px'});
	}).on('blur', function(){
		$(this).parent().find('input[type=text]').css({'width':''});
	});
	$('#cat_form_management #new.itgc_grid3 > form > input[type=text]').css({'width':'60px'});
	$('#cat_form_management #new.itgc_grid3 > form > input[type=text]').first().css({'width':'274.5px'});

});


