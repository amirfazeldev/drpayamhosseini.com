<?
function faq_management(){
	
	if( ! admin_logged_in() ){
		return admin_login_form();
	} else switch (@$_REQUEST['faq']) {
		
		case 'newfaq':
			$faq_list=0;
			$faq_new=1;
			break;

		case 'listfaq':
			$faq_list=1;
			$faq_new=0;
			break;
	
		default :
			$faq_list=1;
			$faq_new=0;
			break;
	}
?>
<div class="do_admin">
	<div class="admin-hed">
	  <h2>سوالات متداول</h2>            
	</div>
	<div class="do_admin_kadr">
		<div class="listmaker_tabmenu_line"></div>
		<div class="listmaker_tabmenu" dir="rtl"> 

		  	<a class="<?=
		  	( 
			$faq_list 
				? 'listmaker_tabmenu_disabled">' 
				: 'listmaker_tabmenu_normal" href="./?page=admin&component=faq_mg&faq=listfaq">' 
			) 
			?>لیست سوالات</a>
			<a class="<?=
		  	( 
			$faq_new 
				? 'listmaker_tabmenu_disabled">' 
				: 'listmaker_tabmenu_normal" href="./?page=admin&component=faq_mg&faq=newfaq">' 
			) 
			?>ایجاد سوال جدید</a>
		</div>
		<?
		if ($faq_list==1) {
		 	faq_management_list();
		 }elseif ($faq_list==0) {
		 	faq_management_form();
		 } 

		?>
	</div>	
</div>
<?

}
