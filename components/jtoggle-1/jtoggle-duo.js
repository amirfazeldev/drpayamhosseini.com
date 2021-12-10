
// 2016/09/05

$(document).ready(function(){

	$('input[type=jtoggle]').wrap('<ul class="jtoggle-ul" ></ul>');
	$('.jtoggle-ul').append('<li class="yes">ON<li class="middle"><li class="no">OFF');
	
	$('input[type=jtoggle]').each(function( index ){
		
		if( $(this).val()!="0" ){
			$(this).parent().find('.yes').css({'margin-left':'0px'});
			$(this).parent().find('.no').css({'margin-right':'-45px'});
		}

	});

	$('.jtoggle-ul').on('mousedown', function (){
		
		var jt = $(this).find('input[type=jtoggle]');
		var jY = $(this).find('.yes');
		var jN = $(this).find('.no');

		var func_name = 'jtoggle_' + jt.attr('name') ;
		
		if( jt.val()=="0" ){
			// console.log('if 0');
			jY.css({'margin-left':'0px'});
			jN.css({'margin-right':'-45px'});
			jt.val( "1" );
			
			if (typeof window[func_name] == 'function') {
				window[func_name]( jt, 1 );
			}

		} else {
			// console.log('if 1');
			jY.css({'margin-left':'-45px'});
			jN.css({'margin-right':'0px'});
			jt.val( "0" );

			if (typeof window[func_name] == 'function') {
				window[func_name]( jt, 0 );
			}
		}

	});

});

