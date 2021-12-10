<?
function uplod()
{
	if( ! admin_logged_in() ){
		return admin_login_form();
	} else switch (@$_REQUEST['uplod']) {
		
		case 'newuplod':
			$uplod_list=0;
			$uplod_new=1;
			break;

		case 'listuplod':
			$uplod_list=1;
			$uplod_new=0;
			break;
	
		default :
			$uplod_list=1;
			$uplod_new=0;
			break;
	}
?>
<div class="do_admin">
	<div class="admin-hed">
	  <h2>مدیریت اسلایدر</h2>            
	</div>
	<div class="do_admin_kadr">
		<div class="listmaker_tabmenu_line"></div>
		<div class="listmaker_tabmenu" dir="rtl"> 

		  	<a class="<?=
		  	( 
			$uplod_list 
				? 'listmaker_tabmenu_disabled">' 
				: 'listmaker_tabmenu_normal" href="./?page=admin&component=uplod&uplod=listuplod">' 
			) 
			?>لیست فایل ها</a>
			<a class="<?=
		  	( 
			$uplod_new 
				? 'listmaker_tabmenu_disabled">' 
				: 'listmaker_tabmenu_normal" href="./?page=admin&component=uplod&uplod=newuplod">' 
			) 
			?>ایجاد فایل جدید</a>
		</div>
		<?
		if ($uplod_list==1) {
		 	uplod_management_list();
		 }elseif ($uplod_list==0) {
		 	uplod_management_form();
		 } 

		?>
	</div>	
</div>
<?

}
