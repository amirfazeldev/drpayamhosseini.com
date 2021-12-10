<?
function desc_management_form(){
	switch (@$_REQUEST['do']) {
				
		case 'saveEdit':
			desc_management_form_saveEdit();
			break;
		case 'saveNew':
			desc_management_form_saveNew();
			break;	
		
		}
	
	if( ! admin_logged_in() ){
		return admin_login_form();
	} else if( ! $rs = dbq("SELECT * FROM `description` WHERE `id`='1'")){
		echo "err - ".__LINE__." at ".__FUNCTION__;
	} else if( ! $rw = dbf($rs)){
		?>
		<div class="ok-p">اطلاعات این قسمت وارد نشده است .لطفا تکمیل شود</div>
		<?		
	}else 
?>
	<div class="kadr">
		<form class="admin_form" method="post" action="./?page=admin&component=desc_management&desc=newdesc<?='&do='.
		( 
		@$rw 
			? 'saveEdit&id=1'
			: 'saveNew' 
		)
		?>" enctype="multipart/form-data">				
			<input type="text" placeholder="عنوان" name="title" class="username" value="<?=@$rw['title']?>" /><br>
			<textarea class="nav-textarea" style="width: 50%;" placeholder="توضیحات درباره ما" name="description"><?=@$rw['description']?></textarea><br>
			<h5 style="display:inline;">درج عکس:</h5>
			<input type="file" name="file" style=" color: #777;width: 79%;display: inline;" class="file-btn">
			<?
			if (@$rw) {
				?>
				<img class="log-edit-product" src="<?=_URL?>/<? echo$rw["img"];?>" />
				<?
			}
			?>
			
			<br>

           <input type="hidden" value="<?php echo @$rw["id"];?>" name="id">
           <input type="hidden" value="<?php echo $rw["img"];?>" name="img">
			<input type="submit" value="انجام تغییرات" name="save" class="btn btn-primary" />
		</form>
	</div>	
<?	
}