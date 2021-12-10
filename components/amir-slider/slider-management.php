<?
function slider_management(){
	
	if( ! admin_logged_in() ){
		return admin_login_form();
	} else switch (@$_REQUEST['slider']) {
		
		case 'newslider':
			$slider_list=0;
			$slider_new=1;
			break;

		case 'listslider':
			$slider_list=1;
			$slider_new=0;
			break;
	
		default :
			$slider_list=1;
			$slider_new=0;
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
			$slider_list 
				? 'listmaker_tabmenu_disabled">' 
				: 'listmaker_tabmenu_normal" href="./?page=admin&component=slider_management&slider=listslider">' 
			) 
			?>لیست اسلایدها</a>
			<a class="<?=
		  	( 
			$slider_new 
				? 'listmaker_tabmenu_disabled">' 
				: 'listmaker_tabmenu_normal" href="./?page=admin&component=slider_management&slider=newslider">' 
			) 
			?>ایجاد اسلاید جدید</a>
		</div>
		<?
		if ($slider_list==1) {
		 	slider_management_list();
		 }elseif ($slider_list==0) {
		 	slider_management_form();
		 } 

		?>
	</div>	
</div>
<?

}
