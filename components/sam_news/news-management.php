<?
function news_management(){
	
	if( ! admin_logged_in() ){
		return admin_login_form();
	} else switch (@$_REQUEST['do-component']) {
		
		case 'newnews':
			$news_list=0;
			$news_new=1;
			$news_cat=0;
			break;

		case 'listnews':
			$news_list=1;
			$news_new=0;
			$news_cat=0;
			break;
		case 'news_cat':
			$news_cat=1;
			$news_list=0;
			$news_new=0;
			break;
		default :
			$news_list=1;
			$news_new=0;
			$news_cat=0;
			break;
	}
?>
<div class="do_admin">
	<div class="admin-hed">
	  <h2>مدیریت اخبار</h2>            
	</div>
	<div class="do_admin_kadr">
		<div class="listmaker_tabmenu_line"></div>
		<div class="listmaker_tabmenu" dir="rtl"> 

		  	<a class="<?=
		  	( 
			$news_list 
				? 'listmaker_tabmenu_disabled">' 
				: 'listmaker_tabmenu_normal" href="./?page=admin&component=news&do-component=listnews">' 
			) 
			?>لیست اخبار</a>
			<a class="<?=
		  	( 
			$news_new 
				? 'listmaker_tabmenu_disabled">' 
				: 'listmaker_tabmenu_normal" href="./?page=admin&component=news&do-component=newnews">' 
			) 
			?>ایجاد خبر جدید</a>
			<a class="<?=
		  	( 
			$news_cat 
				? 'listmaker_tabmenu_disabled">' 
				: 'listmaker_tabmenu_normal" href="./?page=admin&component=news&do-component=news_cat">' 
			) 
			?>ایجاد  دسته خبر جدید</a>
		</div>
		<?
		if ($news_list==1) {
		 	news_management_list();
		 }elseif ($news_new==1) {
		 	news_management_form();
		 }elseif ($news_cat==1) {
		 	news_cat();
		 } 

		?>
	</div>	
</div>
<?

}
