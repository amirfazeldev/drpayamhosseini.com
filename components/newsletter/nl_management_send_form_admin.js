
$(document).ready(function(){
	
	$('#nlmg_list_of_emails_checkbox').on('click', function(){
		$('#nlmg_list_of_emails').toggle();		
	});

	$('.nl_management_send_form').on('submit', function(e){

		
		//
		// if no text
		if( $('#nl_management_send_form_text').val()=='' ) {
			$('#nl_management_send_form_text').focus();
			$('#nl_management_send_form_text').addClass('warn');
			e.preventDefault();
		}

		//
		// if no subject
		if( $('#nl_management_send_form_subject').val()=='' ) {
			$('#nl_management_send_form_subject').focus();
			$('#nl_management_send_form_subject').addClass('warn');
			e.preventDefault();
		}


		//
		// if no checkbox checked
		if( (document.getElementById('newsletter_email_list').checked) || (document.getElementById('users_email_list').checked) || (document.getElementById('nlmg_list_of_emails_checkbox').checked) ){
			console.log('its ok');
		} else {
			e.preventDefault();
		}
	})

});

