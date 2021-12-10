<?php
function setting()
{
	switch (@$_REQUEST['do']) {
				
		case 'saveEdit':
			# 
			# logo main
			$f = fileupload("logo","logo");
			if( $f[0] ){
				setting_mg_saveEdit('logo',$f);
			}
			# 
			# fav main
			$f1 = fileupload("fav","fav");
			if( $f1[0] ){
				setting_mg_saveEdit('fav',$f1);
			}
			foreach( $_REQUEST as $k => $r ){
				if( table('setting',$k,null,'slug') ){
					setting_mg_saveEdit( $k, $r );
				}
			}
			break;
			setting_mg_saveEdit();
			break;
		
		}
?>	
<div class="do_admin">
	<div class="admin-hed">
          <h2>تنظیمات سایت</h2>            
    </div>
    <div class="listmaker_tabmenu_line"></div>
    <div class="tabmenu_setting">
		<div class="dashboard">			        
			<form method="post" action="./?page=admin&component=setting&do=saveEdit" enctype="multipart/form-data">
				<div class="inDiv">
					<span><?= setting_rw( "main_title" )['name'];?></span><input type="text" value="<?= setting_rw( "main_title" )['text'];?>" name="<?= setting_rw( "main_title" )['slug'];?>">
				</div>

				<div class="inDiv">	
					<span><?= setting_rw( "html_footer_copyright" )['name'];?></span><input type="text" value="<?= setting_rw( "html_footer_copyright" )['text'];?>" name="<?= setting_rw( "html_footer_copyright" )['slug'];?>">
				</div>
					
				<div class="inDiv">
					<span><?= setting_rw( "keywords" )['name'];?></span><textarea name="<?= setting_rw( "keywords" )['slug'];?>" class="textarea"><?= setting_rw( "keywords" )['text'];?></textarea>
				</div>
						
				<div class="inDiv">
					<span><?= setting_rw( "description" )['name'];?></span><textarea name="<?= setting_rw( "description" )['slug'];?>" class="textarea" ><?= setting_rw( "description" )['text'];?></textarea>
				</div>

				<div class="inDiv">	
					<span><?= setting_rw( "html_extra_tags" )['name'];?></span><textarea name="<?= setting_rw( "html_extra_tags" )['slug'];?>" class="textarea" ><?= setting_rw( "html_extra_tags" )['text'];?></textarea>
				</div>
				<div class="inDiv">	
					<span><?= setting_rw( "webstatus_main_content" )['name'];?></span><textarea name="<?= setting_rw( "webstatus_main_content" )['slug'];?>" class="textarea" ><?= setting_rw( "webstatus_main_content" )['text'];?></textarea>
				</div>
				<div class="inDiv">	
					<span><?= setting_rw( "logo" )['name'];?></span><input type="file" name="<?= setting_rw( "logo" )['slug'];?>" id="" class="file-btn">
					<img class="log-edit-product" src="<?=_URL?>/<?=setting_rw( "logo" )['text'];?>" />
				</div>
				<div class="inDiv">	
					<span><?= setting_rw( "fav" )['name'];?></span><input type="file" name="<?= setting_rw( "fav" )['slug'];?>" id="" class="file-btn">
					<img class="log-edit-product" src="<?=_URL?>/<?=setting_rw( "fav" )['text'];?>" />
				</div>

				<div class="inDiv">
					<span><?= setting_rw( "webstatus_main" )['name'];?></span><input type="jtoggle" value="<?= setting_rw( "webstatus_main" )['text'];?>" name="<?= setting_rw( "webstatus_main" )['slug'];?>">
				</div>
				<div class="inDiv">
					<span><?= setting_rw( "time_work" )['name'];?></span><input type="text" value="<?= setting_rw( "time_work" )['text'];?>" name="<?= setting_rw( "time_work" )['slug'];?>">
				</div>
				
				<div class="inDiv">
					<span><?= setting_rw( "email" )['name'];?></span><input type="text" value="<?= setting_rw( "email" )['text'];?>" name="<?= setting_rw( "email" )['slug'];?>">
				</div>
				<div class="inDiv">
					<span><?= setting_rw( "tell" )['name'];?></span><input type="text" value="<?= setting_rw( "tell" )['text'];?>" name="<?= setting_rw( "tell" )['slug'];?>">
				</div>
				<div class="inDiv">
					<span><?= setting_rw( "cell" )['name'];?></span><input type="text" value="<?= setting_rw( "cell" )['text'];?>" name="<?= setting_rw( "cell" )['slug'];?>">
				</div>
				<div class="inDiv">
					<span><?= setting_rw( "addres" )['name'];?></span><input type="text" value="<?= setting_rw( "addres" )['text'];?>" name="<?= setting_rw( "addres" )['slug'];?>">
				</div>
				<div class="inDiv">	
					<input type="submit" value="ویرایش" class="upload-btn" name="update-btn" style="margin-top: 10px;">
				</div>	
			</form>		
		</div>	
	</div>	
</div>
<?}?>