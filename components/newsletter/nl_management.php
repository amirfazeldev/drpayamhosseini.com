<?
function nl_management(){

if( ! admin_logged_in() ){
		return admin_login_form();
	} else switch (@$_REQUEST['fanc']) {
		
		case 'nl_management_new':
			$nl_list=0;
			$nl_new=1;
			break;

		case 'nl_management_list':
			$nl_list=1;
			$nl_new=0;
			break;
	
		default :
			$nl_list=0;
			$nl_new=1;
			break;
	}
?>
<div class="do_admin">
	<div class="admin-hed">
	  <h2>خبرنامه</h2>            
	</div>
	<div class="do_admin_kadr">
		<div class="listmaker_tabmenu_line"></div>
		<div class="listmaker_tabmenu" dir="rtl"> 
			
			<a class="<?=
		  	( 
			$nl_new 
				? 'listmaker_tabmenu_disabled">' 
				: 'listmaker_tabmenu_normal" href="./?page=admin&component=nl_management&fanc=nl_management_new">' 
			) 
			?>ارسال خبرنامه </a>
		  	<a class="<?=
		  	( 
			$nl_list 
				? 'listmaker_tabmenu_disabled">' 
				: 'listmaker_tabmenu_normal" href="./?page=admin&component=nl_management&fanc=nl_management_list">' 
			) 
			?>لیست ایمیل ها</a>
			
		</div>
		<?
		if ($nl_list==1) {
		 	nl_management_emailList();
		 }elseif ($nl_list==0) {
		 	nl_management_send_form();
		 } 

		?>
	</div>	
</div>
<?

}

