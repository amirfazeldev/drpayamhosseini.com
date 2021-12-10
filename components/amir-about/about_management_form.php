<?
function about_management_form(){
	switch (@$_REQUEST['do']) {
				
		case 'saveEdit':
			about_management_form_saveEdit();
			break;
		case 'saveNew':
			about_management_form_saveNew();
			break;	
		
		}
	
	if( ! admin_logged_in() ){
		return admin_login_form();
	} else if( ! $rs = dbq("SELECT * FROM `about` WHERE `id`='1'")){
		echo "err - ".__LINE__." at ".__FUNCTION__;
	} else if( ! $rw = dbf($rs)){
		?>
		<div class="ok-p">اطلاعات این قسمت وارد نشده است .لطفا تکمیل شود</div>
		<?		
	}else 
?>
	<div class="kadr">
		<form class="admin_form" method="post" action="./?page=admin&component=admin-about&about=newabout<?='&do='.
		( 
		@$rw 
			? 'saveEdit&id=1'
			: 'saveNew' 
		)
		?>" enctype="multipart/form-data">				
			
			<textarea class="nav-textarea" style="width: 50%;" placeholder="توضیحات درباره ما" name="description"><?=@$rw['description']?></textarea><br>
			
			<br>

           <input type="hidden" value="<?php echo @$rw["id"];?>" name="id">
			<input type="submit" value="انجام تغییرات" name="save" class="btn btn-primary" />
		</form>
	</div>	
<?	
}