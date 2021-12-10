<?
function linkify_mg_this()
{
	if( ! admin_logged_in() ){
		return admin_login_form();
	} else switch (@$_REQUEST['func']) {
		
		case 'newlinkify':
			$linkify_list=0;
			$linkify_new=1;
			break;

		case 'listlinkify':
			$linkify_list=1;
			$linkify_new=0;
			break;
	
		default :
			$linkify_list=1;
			$linkify_new=0;
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
			<a class="listmaker_tabmenu_normal" href="./?page=admin&component=linkify&linkify=listlinkifycat">لیست جعبه ها</a>
		  	<a class="<?=
		  	( 
			$linkify_list 
				? 'listmaker_tabmenu_disabled">' 
				: 'listmaker_tabmenu_normal" href="./?page=admin&component=linkify&linkify=view&func=listlinkify&cat='.@$_REQUEST['cat'].'&parent='.$_REQUEST['parent'].'">' 
			) 
			?>لیست پیوند ها</a>
			<a class="<?=
		  	( 
			$linkify_new 
				? 'listmaker_tabmenu_disabled">' 
				: 'listmaker_tabmenu_normal" href="./?page=admin&component=linkify&linkify=view&func=newlinkify&cat='.@$_REQUEST['cat'].'&parent='.$_REQUEST['parent'].'">' 
			) 
			?>ایجاد پیوند جدید </a>
		</div>
		<?
		if ($linkify_list==1) {
		 	linkify_management_list();
		 }elseif ($linkify_list==0) {
		 	linkify_management_form();
		 } 

		?>
	</div>	
</div>
<?
}