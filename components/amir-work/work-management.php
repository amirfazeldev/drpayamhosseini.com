<?
function work_management(){
	
	if( ! admin_logged_in() ){
		return admin_login_form();
	} else switch (@$_REQUEST['work']) {
		
		case 'newwork':
			$work_list=0;
			$work_new=1;
			break;

		case 'listwork':
			$work_list=1;
			$work_new=0;
			break;
	
		default :
			$work_list=1;
			$work_new=0;
			break;
	}
?>
<div class="do_admin">
	<div class="admin-hed">
	  <h2>مدیریت نمونه کارها</h2>            
	</div>
	<div class="do_admin_kadr">
		<div class="listmaker_tabmenu_line"></div>
		<div class="listmaker_tabmenu" dir="rtl"> 

		  	<a class="<?=
		  	( 
			$work_list 
				? 'listmaker_tabmenu_disabled">' 
				: 'listmaker_tabmenu_normal" href="./?page=admin&component=work-sample&work=listwork">' 
			) 
			?>لیست نمونه کارها</a>
			<a class="<?=
		  	( 
			$work_new 
				? 'listmaker_tabmenu_disabled">' 
				: 'listmaker_tabmenu_normal" href="./?page=admin&component=work-sample&work=newwork">' 
			) 
			?>ایجاد نمونه کار جدید</a>
		</div>
		<?
		if ($work_list==1) {
		 	work_management_list();
		 }elseif ($work_list==0) {
		 	work_management_form();
		 } 

		?>
	</div>	
</div>
<?

}
