<?

function do_user(){

	if( ! user_logged_in() ){
		return user_login_form();
	} else switch (@$_REQUEST['do_slug']) {

		case 'user-panel' :		
		    user_panel();
	    	break;

		case 'logout' :			
			user_logut_do();
			break; 
			
		case 'regester':
			user_regester_form();
			break;		
	
		default :
			user_panel();
			break;			
	}
}
