
// 2016/07/11

document.write('<div id="tooltip"></div>');

jQuery(document).ready(function($) {
	
	// remove all 'title' , and replace it with 'tooltip-title'
	$("*").each(function(index){
		var attr = $(this).attr('title');
		if(typeof attr !== typeof undefined && attr !== false){
			title = $(this).attr('title');
			$(this).removeAttr('title');
			$(this).attr('tooltip-title', title);
		}
	});

	// run tooltip
	mouse_left = 0;
	mouse_top = 0;
	$( document ).on( "mousemove", function( e ) {
		mouse_left = e.pageX;
		mouse_top = e.pageY;
		// cl( "pageX: " + e.pageX + ", pageY: " + e.pageY );
	});

	$('*').on('mouseenter', function(){
		var title = $(this).attr('tooltip-title');
		if(typeof title !== typeof undefined && title !== false && title!=''){
			$('#tooltip').html( title );
			$('#tooltip').css({ 'left':(mouse_left+15), 'top':(mouse_top+15) });
			$('#tooltip').show(100);
		}
	
	}).on('mouseleave', function(){
		$('#tooltip').hide();
	});


});