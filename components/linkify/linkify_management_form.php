<?
function linkify_management_form()
{
	switch (@$_REQUEST['do']) {
		
		case 'saveNew':
			linkify_management_form_saveNew();
			break;
		
		case 'saveEdit':
			linkify_management_form_saveEdit();
			break;
		
		}
	
	if( ! admin_logged_in() ){
		return admin_login_form();
	} else if( ! $id = @$_REQUEST['id']){
		;//
	} else if( ! $rs = dbq("SELECT * FROM `linkify` WHERE `id`='$id' LIMIT 1 ")){
		echo "err - ".__LINE__." at ".__FUNCTION__;
	} else if( ! $rw = dbf($rs)){
		echo "err - ".__LINE__." at ".__FUNCTION__;		
	}else 
?>
	<div class="kadr">
		<form class="admin_form" method="post" action="./?page=admin&component=linkify&linkify=view&func=newlinkify<?='&cat='.$_REQUEST["cat"].'&parent='.$_REQUEST["parent"].'&do='.
		( 
		@$rw 
			? 'saveEdit&id='.$id 
			: 'saveNew' 
		)
		?>" enctype="multipart/form-data">				
			
			
			<div class="inDiv">
				<input type="text" placeholder="عنوان پیوند" name="name" class="username" value="<?=@$rw['name']?>" />
			</div><br>
			<div class="inDiv">
				<input type="text" placeholder="آدرس پیوند" name="url" class="username" value="<?=@$rw['url']?>" />
			</div><br>
			<?
			if(! $rs2 = dbq(" SELECT * FROM `linkify_config` WHERE `id`='".$_REQUEST['cat']."' ")){
			    echo "error on ".__FUNCTION__." at ".__LINE__;
			  } else if($rw2 = dbf($rs2)){
			  	if (@$rw2["haveIcon"]) {
					?>
					<h5 style="display:inline;">درج عکس:</h5>
					<input type="file" name="file"  class="file-btn">
					
					<?
					if (@$rw["img"]) {
						?>	
						<img class="log-edit-product" src="<?=_URL?>/<? echo$rw["img"];?>" />
						<?
					}
				}
			  }
			?>
			<input type="hidden" value="<?php echo @$rw["id"];?>" name="id">
			<input type="hidden" value="<?php echo @$rw["img"];?>" name="img">
			<br>
			<div class="inDiv">
				<input type="submit" value="ثبت" name="save" class="btn btn-primary" />
			</div>			
		</form>
	</div>
<?
}