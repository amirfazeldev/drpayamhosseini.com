
jQuery(document).ready(function($) {
	var input = $('.clockpicker').clockpicker({
	    placement: 'bottom',
	    align: 'left',
	    autoclose: true,
	    'default': 'now'
	}).on('keypress', function(e){
		e.preventDefault();
	});
});

