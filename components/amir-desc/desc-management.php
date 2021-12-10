<?
function desc_management(){
	
	if( ! admin_logged_in() ){
		return admin_login_form();
	} else 
?>
			<div class="do_admin">
				<div class="admin-hed">
		              <h2>مدیریت درباره ما</h2>            
		        </div>
		        <div class="do_admin_kadr">
					<div class="listmaker_tabmenu_line"></div>
					<div class="listmaker_tabmenu" dir="rtl"> 
					  	<a class="listmaker_tabmenu_disabled" href="#">درباره شمال تک</a>
					</div>				
					<?desc_management_form();?>
				</div>	
			</div>
			<?

}