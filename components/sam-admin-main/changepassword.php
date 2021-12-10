<?
function changepassword()
{
?>
<div class="do_admin">
	<div class="admin-hed">
          <h2>تغییر کلمه عبور</h2>            
    </div>
    <div class="listmaker_tabmenu_line"></div>
    <div class="tabmenu_setting">
	<div class="kadr">
	
<?	
	switch (@$_REQUEST['do']) {
				
		case 'saveEdit':
			changepassword_saveEdit();
			break;		
		
		}
	
	if(!admin_logged_in() ){
		return admin_login_form();
	}else{	
?>
	<br>
	<form method="post" action="./?page=admin&component=changepassword&do=saveEdit" enctype="multipart/form-data" class="admin_form">
			
			<input type="password" class="user-panel-input" value="" placeholder="پسورد قبلی" name="oldpassword">
		
		<br>
		
			<input type="password" class="user-panel-input" value="" placeholder="پسورد جدید" name="password1">
		
		<br>
		
			<input type="password" class="user-panel-input" value="" placeholder="تکرار پسورد جدید" name="password2">
			
		<br>
			
			<input type="submit" class="btn btn-primary" value="ثبت" name="btn">
		
	</form>
</div>
</div>
<?
}
	}