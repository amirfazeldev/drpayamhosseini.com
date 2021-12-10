<?
function linkify_cat_management_form(){
	switch (@$_REQUEST['do']) {
		
		case 'saveNew':
			linkify_cat_management_form_saveNew();
			break;
		
		case 'saveEdit':
			linkify_cat_management_form_saveEdit();
			break;
		
		}
	
	if( ! admin_logged_in() ){
		return admin_login_form();
	} else if( ! $id = @$_REQUEST['id']){
		;//
	} else if( ! $rs = dbq("SELECT * FROM `linkify_config` WHERE `id`='$id' LIMIT 1 ")){
		echo "err - ".__LINE__." at ".__FUNCTION__;
	} else if( ! $rw = dbf($rs)){
		echo "err - ".__LINE__." at ".__FUNCTION__;		
	}else 
?>
	<div class="kadr">
		<form class="admin_form" method="post" action="./?page=admin&component=linkify&linkify=newlinkifycat<?='&do='.
		( 
		@$rw 
			? 'saveEdit&id='.$id 
			: 'saveNew' 
		)
		?>" enctype="multipart/form-data">				
			
			
			<div class="inDiv">
				<input type="text" placeholder="عنوان جعبه پیوند" name="name" class="username" value="<?=@$rw['name']?>" />
			</div><br>
			<div class="inDiv">
					<span>زیر پیوند</span><input type="jtoggle" value="<?=( 
		@$rw 
			? ''.$rw["haveSub"] 
			: '0' 
		)?>" name="haveSub">
			</div><br>
			<div class="inDiv">
					<span>آیکن</span><input type="jtoggle" value="<?=( 
		@$rw 
			? ''.$rw["haveIcon"] 
			: '0' 
		)?>" name="haveIcon">
			</div><br>
			<input type="hidden" value="<?php echo @$rw["id"];?>" name="id">
			<div class="inDiv">
				<input type="submit" value="ثبت" name="save" class="btn btn-primary" />
			</div>			
		</form>
	</div>
<?
}
