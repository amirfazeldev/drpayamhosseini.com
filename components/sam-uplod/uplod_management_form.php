<?
function uplod_management_form(){
	switch (@$_REQUEST['do']) {
		
		case 'saveNew':
			uplod_management_form_saveNew();
			break;
		
		case 'saveEdit':
			uplod_management_form_saveEdit();
			break;
		
		}
	
	if( ! admin_logged_in() ){
		return admin_login_form();
	} else if( ! $id = @$_REQUEST['id']){
		;//
	} else if( ! $rs = dbq("SELECT * FROM `uplod` WHERE `id`='$id' LIMIT 1 ")){
		echo "err - ".__LINE__." at ".__FUNCTION__;
	} else if( ! $rw = dbf($rs)){
		echo "err - ".__LINE__." at ".__FUNCTION__;		
	}else 
?>
	<div class="kadr">
		<form class="admin_form" method="post" action="./?page=admin&component=uplod&uplod=newuplod&do=saveNew" enctype="multipart/form-data">
			<h5 style="display:inline;">درج فایل:</h5>
			<input type="file" name="file" style=" color: #777;width: 79%;display: inline;" class="file-btn">
			<br>
			<input type="submit" value="ثبت" name="save" class="btn btn-primary" />
		</form>
	</div>
<?
}
