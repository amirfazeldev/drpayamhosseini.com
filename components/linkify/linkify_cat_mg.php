<?
function linkify_mg()
{
	if( ! admin_logged_in() ){
		return admin_login_form();
	} else switch (@$_REQUEST['linkify']) {
		
		case 'newlinkifycat':
			$linkify_cat_list=0;
			$linkify_cat_new=1;
			break;

		case 'listlinkifycat':
			$linkify_cat_list=1;
			$linkify_cat_new=0;
			break;

		case 'view':
			return linkify_mg_this();	
	
		default :
			$linkify_cat_list=1;
			$linkify_cat_new=0;
			break;
	}
?>
<div class="do_admin">
	<div class="admin-hed">
	  <h2>جعبه پیوند</h2>            
	</div>
	<div class="do_admin_kadr">
		<div class="listmaker_tabmenu_line"></div>
		<div class="listmaker_tabmenu" dir="rtl"> 

		  	<a class="<?=
		  	( 
			$linkify_cat_list 
				? 'listmaker_tabmenu_disabled">' 
				: 'listmaker_tabmenu_normal" href="./?page=admin&component=linkify&linkify=listlinkifycat">' 
			) 
			?>لیست جعبه ها</a>
			<a class="<?=
		  	( 
			$linkify_cat_new 
				? 'listmaker_tabmenu_disabled">' 
				: 'listmaker_tabmenu_normal" href="./?page=admin&component=linkify&linkify=newlinkifycat">' 
			) 
			?>ایجاد جعبه جدید</a>
		</div>
		<?
		if ($linkify_cat_list==1) {
		 	linkify_cat_management_list();
		 }elseif ($linkify_cat_list==0) {
		 	linkify_cat_management_form();
		 } 

		?>
	</div>	
</div>
<?

}
