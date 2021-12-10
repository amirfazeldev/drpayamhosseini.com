<?
function linkify_management_form_saveEdit()
{
	if(! $rs2 = dbq(" SELECT * FROM `linkify_config` WHERE `id`='".$_REQUEST['cat']."' ")){
			    echo "error on ".__FUNCTION__." at ".__LINE__;
			  } elseif($rw2 = dbf($rs2)){
			  	if (@$rw2["haveIcon"]) {
				  		if($_FILES["file"]["error"]>0 && !$loc2 = $_REQUEST['img']) {
							?>
							<div class="error-p">فیلد تصویر الزامی است.</div>
							<?
						}elseif (! $img=fileupload("linkify")) {
									 		?>
						<div class="error-p">فایل آپلود نشد.</div>
						<?
					 }
			  	}else{$img="";}
			  }
	if(! $parent = $_REQUEST['parent']){
		$parent=0;
	}
	if(! $id = $_REQUEST['id']){
		?>
		<div class="error-p">پیوند نا معتبر.</div>
		<?
	}elseif(! $cat = $_REQUEST['cat']){
		?>
		<div class="error-p">دسته نا معتبر.</div>
		<?
	}elseif(! $name = $_REQUEST['name']){
		?>
		<div class="error-p">فیلد عنوان الزامی است.</div>
		<?
	}elseif(! $url = $_REQUEST['url']){
		?>
		<div class="error-p">فیلد آدرس پیوند الزامی است.</div>
		<?
	}elseif(! $rs = dbq("UPDATE `linkify` SET `name`='{$name}',`url`='{$url}',`img`='{$img}',`cat`='{$cat}',`parent`='{$parent}' WHERE `id`='{$id}'")){
		?>
		<div class="error-p"> ثبت نشد.</div>
		<?
	} else {
		?>
		<div class="ok-p"> با موفقیت ثبت شد.</div>
		<?	

	}
}