<?
function news_management_form(){
	switch (@$_REQUEST['do']) {
		
		case 'saveNew':
			news_management_form_saveNew();
			break;
		
		case 'saveEdit':
			news_management_form_saveEdit();
			break;
		
		}
	
	if( ! admin_logged_in() ){
		return admin_login_form();
	} else if( ! $id = @$_REQUEST['id']){
		;//
	} else if( ! $rs = dbq("SELECT * FROM `news` WHERE `id`='$id' LIMIT 1 ")){
		echo "err - ".__LINE__." at ".__FUNCTION__;
	} else if( ! $rw = dbf($rs)){
		echo "err - ".__LINE__." at ".__FUNCTION__;		
	}else 
?>
	<div class="kadr">
		<form class="admin_form" method="post" action="./?page=admin&component=news&do-component=newnews<?='&do='.
		( 
		@$rw 
			? 'saveEdit&id='.$id  
			: 'saveNew' 
		)
		?>" enctype="multipart/form-data">				
			<input type="text" placeholder="عنوان" name="name" class="username" value="<?=@$rw['name']?>" /><br>
			<label for="cat-work">دسته خبر:</label>
            <select name="cat_id">
            	<?
            		$cat_array = cat_display('news');
					foreach ($cat_array as $id => $name) {
						echo "<option value=\"".$id."\"";
						echo($id==@$rw['cat_id']) ? "selected":"";
						echo ">".$name."</option>";
					}
            	?>
            </select>
			<br>
			<br>
			<h5 style="display:inline;">درج عکس:</h5>
			<input type="file" name="file" style=" color: #777;width: 79%;display: inline;" class="file-btn">
			<?
			if (@$rw) {
				?>
				<img class="log-edit-product" src="<?=_URL?>/<? echo$rw["pic"];?>" />
				<?
			}
			?>
			
			<br>
			<textarea class="nav-textarea" style="width: 50%;" placeholder="کلمات کلیدی" name="tag"><?=@$rw['tag']?></textarea><br>
			<textarea class="tinymce nav-textarea" style="width: 50%;" placeholder="توضیحات" name="text"><?=@$rw['text']?></textarea>
			<!-- <textarea id="content" name="texe" class="ckeditor" placeholder="توضیحات"  ><?=@$rw['text']?></textarea> -->
			<!-- <textarea name="text" id="text" rows="10" cols="80">
            </textarea>
            <?=@$rw['text']?>
            <script>
                CKEDITOR.replace( 'text' );
            </script>
            </textarea> -->
			<br>	

           <input type="hidden" value="<?php echo @$rw["id"];?>" name="id">
           <input type="hidden" value="<?php echo @$rw["pic"];?>" name="img">
			<input type="submit" value="ثبت" name="save" class="btn btn-primary" />
		</form>
	</div>
<?
}
