<?
function faq_management_form(){
	switch (@$_REQUEST['do']) {
		
		case 'saveNew':
			faq_management_form_saveNew();
			break;
		
		case 'saveEdit':
			faq_management_form_saveEdit();
			break;
		
		}
	
	if( ! admin_logged_in() ){
		return admin_login_form();
	} else if( ! $id = @$_REQUEST['id']){
		;//
	} else if( ! $rs = dbq("SELECT * FROM `faq` WHERE `id`='$id' LIMIT 1 ")){
		echo "err - ".__LINE__." at ".__FUNCTION__;
	} else if( ! $rw = dbf($rs)){
		echo "err - ".__LINE__." at ".__FUNCTION__;		
	}else 
?>
	<div class="kadr">
		<form class="admin_form" method="post" action="./?page=admin&component=faq_mg&faq=newfaq<?='&do='.
		( 
		@$rw 
			? 'saveEdit&id='.$id 
			: 'saveNew' 
		)
		?>" enctype="multipart/form-data">
			<input type="text" placeholder="سوال" name="question"  value="<?=@$rw['question']?>" /><br>
			<textarea class="nav-textarea" style="width: 50%;" placeholder="جواب" name="awnser"><?=@$rw['awnser']?></textarea><br>

           <input type="hidden" value="<?php echo @$rw["id"];?>" name="id">
			<input type="submit" value="ثبت" name="save" class="btn btn-primary" />
		</form>
	</div>
<?
}
