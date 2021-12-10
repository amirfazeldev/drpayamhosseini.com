<?
function do_admin(){

	if( !admin_logged_in() ){
		return admin_login_form();
	} else switch (@$_REQUEST['component']) {

		case 'admin' :		
		    admin_index();
	    	break;

	    case 'linkify' :		
		    linkify_mg();
	    	break;	

		case 'logout' :			
			admin_logut_do();
			break; 

		case 'slider_management' :		
		    slider_management();
	    	break;
			
		case 'contact':
			contact_management();
			break;

		case 'gallery':
			gallery_management();
			break;

		case 'desc_management':
			desc_management();
			break;

		case 'homepage_management':
			homepage_management();
			break;	
			
		case 'portfolio':
			portfolio_management_cat();
			break;

		case 'admin-about':
			about_management();
			break;

		case 'team':
			team_management();
			break;

		case 'garranty_management':
			garranty_management();
			break;

		case 'app_management':
			app_management();
			break;

		case 'team':
			team_management();
			break;

		case 'customer':
			customer_management();
			break;

		case 'process':
			process_management();
			break;

		case 'comments':
			comments_management();
			break;
			
		case 'setting':
			setting();
			break;	

		case 'why_management':
			why_management();
			break;

		case 'marketing_management':
			marketing_management();
			break;

		case 'dm_management':
			dm_management();
			break;

		case 'web_design_management':
			web_design_management();
			break;

		case 'web_design_feature_management':
			web_design_feature_management();
			break;

		case 'graphic_design_management':
			graphic_design_management();
			break;

		case 'graphic_design_services_management':
			graphic_design_services_management();
			break;

		case 'sms_management':
			sms_management();
			break;

		case 'users-mg':
			users_mg();
			break;	

		case 'work_cat':
			work_cat();
			break;

		case 'work-sample':
			work_management();
			break;

		case 'hosting_mg':
			hosting_mg();
			break;	

		case 'services':
			services_management();
			break;
				
		case 'services_cat':
			services_cat();
			break;	

		case 'hosting_cat':
			hosting_cat();
			break;	
		
		case 'sefaresh':
			sefaresh_management();
			break;
			
		case 'changepassword':
			changepassword();
			break;
			
		case 'nl_management':
			nl_management();
			break;
			
		case 'news':
			news_management();
			break;
			
		case 'news_cat':
			news_cat();
			break;	
			
		case 'faq_mg':
			faq_management();
			break;
			
		case 'uplod':
			uplod();
			break;				
			
		case 'mb_mg':
			mb_management();
			break;

		case 'terms_mg':
			terms_management();
			break;

		case 'discount_mg':
			discount_management();
			break;

		case 'portfolio_management':
			portfolio_management();
			break;

		case 'portfolio_cat':
			portfolio_cat();
			break;

		case 'shared_hosting_management':
			shared_hosting_management();
			break;

		case 'shared_hosting_desc_management':
			shared_hosting_desc_management();
			break;

		case 'shared_hosting_cat':
			shared_hosting_cat();
			break;

		case 'seo_management':
			seo_management();
			break;

		default :
			admin_index();
			break;			
	}
}