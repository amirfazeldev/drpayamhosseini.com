<?
function slider_management_form(){
	switch (@$_REQUEST['do']) {
		
		case 'saveNew':
			slide_management_form_saveNew();
			break;
		
		case 'saveEdit':
			slide_management_form_saveEdit();
			break;
		
		}
	
	if( ! admin_logged_in() ){
		return admin_login_form();
	} else if( ! $id = @$_REQUEST['id']){
		;//
	} else if( ! $rs = dbq("SELECT * FROM `slider` WHERE `id`='$id' LIMIT 1 ")){
		echo "err - ".__LINE__." at ".__FUNCTION__;
	} else if( ! $rw = dbf($rs)){
		echo "err - ".__LINE__." at ".__FUNCTION__;		
	}else 
?>
	<div class="kadr">
		<form class="admin_form" method="post" action="./?page=admin&component=slider_management&slider=newslider<?='&do='.
		( 
		@$rw 
			? 'saveEdit&id='.$id 
			: 'saveNew' 
		)
		?>" enctype="multipart/form-data">				
			<input type="text" placeholder="عنوان" name="name" class="username" value="<?=@$rw['name']?>" /><br>
			<input type="url" placeholder="لینک" name="url" class="username" value="<?=@$rw['url']?>" /><br>
			<h5 style="display:inline;">درج عکس:</h5>
			<input type="file" name="file" style=" color: #777;width: 79%;display: inline;" class="file-btn">
			<?
			if (@$rw) {
				?>
				<img class="log-edit-product" src="<?=_URL?>/<? echo$rw["location"];?>" />
				<?
			}
			?>
			
			<br>

           <input type="hidden" value="<?php echo @$rw["id"];?>" name="id">
           <input type="hidden" value="<?php echo @$rw["location"];?>" name="img">
			<input type="submit" value="ثبت" name="save" class="btn btn-primary" />
		</form>
	</div>
<?
}
