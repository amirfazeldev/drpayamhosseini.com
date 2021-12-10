<?

function do_index(){
	switch (@$_REQUEST['page']) {
		
		case 'login' :
			
		if(admin_logged_in() || user_logged_in() ){
	
		echo "<script>location.href='./?page=user+panel';</script>";
	    }else
		user_login_form();
		break;

		case 'register':
		if(admin_logged_in() || user_logged_in() ){
		
		echo "<script>location.href='./?page=register';</script>";
	    }else
		user_register_form();
		break;

         case 'contact' :
         contact();
         break;
         
         case 'about':
         about();
         break;
         
         case 'tarefe':
         tarefe();
         break;

         case 'dentgallery':
         dentgallery();
         break;

         case 'drgallery':
         drgallery();
         break;

         case 'homepage':
         homepage();
         break;

         case 'services':
         services();
         break;

         case 'marketing':
         marketing();
         break;

         case 'portfolio':
         portfolio();
         break;

         case 'terms':
         terms();
         break;

         case 'news':
         news();
         break;

         case 'hosting':
         hosting_vw();
         break;
         
         case 'faq':
         faq();
         break;
         
         case 'mb':
         mb();
         break;

         case 'terms':
         terms();
         break;

         case 'discount':
         discount();
         break;

         case 'news_display':
	     news_display();
	     break;

         case 'all-work-sample':
         portfolio();
         break;

         case 'datacenters':
         datacenters();
         break;

         case 'shared-hosting' :
         shared_hosting();
         break;

         case 'web-design-page' :
         web_design_page();
         break;

         case 'digital-marketing' :
         digital_marketing_page();
         break;

         case 'forgot':
        if(admin_logged_in() || user_logged_in() ){
		$url=_URL;
		echo "<script>location.href='$url/?page=user+panel';</script>";
	    }else
         user_forgot();
         break;

		default:			
			home();
			break;
	}
}

// kolle index az inja hande mishe