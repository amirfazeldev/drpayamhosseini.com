<?
function users_mg()
{
	if( ! admin_logged_in() ){
		return admin_login_form();
	} else switch (@$_REQUEST['users']) {
		
		case 'showusers':
			$users_list=0;
			$users_form=0;
			$users_show=1;
			break;

		case 'formusers':
			$users_list=0;
			$users_form=1;
			$users_show=0;
			break;	

		case 'listusers':
			$users_list=1;
			$users_form=0;
			$users_show=0;
			break;
	
		default :
			$users_list=1;
			$users_form=0;
			$users_show=0;
			break;
	}
?>
<div class="do_admin">
	<div class="admin-hed">
          <h2>مدیریت کاربران</h2>            
    </div>
    <div class="do_admin_kadr">
	    <div class="listmaker_tabmenu_line"></div>
		<div class="listmaker_tabmenu" dir="rtl">     
				  	
			<?
			if ($users_show) {
				echo '<a class="listmaker_tabmenu_normal" href="./?page=admin&component=users-mg&users=listusers">لیست کاربران</a> <a class="listmaker_tabmenu_disabled">مشخصات کاربر</a>' ;
			}else if ($users_form) {
				echo '<a class="listmaker_tabmenu_normal" href="./?page=admin&component=users-mg&users=listusers">لیست کاربران</a> <a class="listmaker_tabmenu_disabled">ویرایش مشخصات کاربر</a>' ;
			}else{
				echo '<a class="listmaker_tabmenu_disabled">لیست کاربران</a>' ;	
			}
			?>
				  
		</div>
			
		<?
		if ($users_list==1) {
		 	users_mg_list();
		 }elseif ($users_show==1) {
		 	users_mg_show();
		 }elseif ($users_form==1) {
		 	users_mg_form();
		 }
		
		?>
	</div>		
</div>
<?
}