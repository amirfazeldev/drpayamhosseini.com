<?
function contact_management(){
	
	if( ! admin_logged_in() ){
		return admin_login_form();
	} else switch (@$_REQUEST['contact']) {
		
		case 'showcontact':
			$contact_list=0;
			$contact_show=1;
			break;

		case 'listcontact':
			$contact_list=1;
			$contact_show=0;
			break;
	
		default :
			$contact_list=1;
			$contact_show=0;
			break;
	}
?>
	<div class="do_admin">
		<div class="admin-hed">
              <h2>مدیریت تماس ها</h2>            
        </div>
        <div class="do_admin_kadr">
			<div class="listmaker_tabmenu_line"></div>
			<div class="listmaker_tabmenu" dir="rtl"> 				  	
				  	<?=
				  	( 
					$contact_show 
						? '<a class="listmaker_tabmenu_normal" href="./?page=admin&component=contact&contact=listcontact">لیست پرسش ها</a> <a class="listmaker_tabmenu_disabled">پاسخ</a>' 
						: '<a class="listmaker_tabmenu_disabled">لیست پرسش ها</a>' 
					)
					?>
			</div>
			<?
			if ($contact_list==1) {
			 	contact_management_list();
			 }elseif ($contact_list==0) {
			 	contact_management_form();
			 } 
			
			?>
		</div>
	</div>
			<?

}
