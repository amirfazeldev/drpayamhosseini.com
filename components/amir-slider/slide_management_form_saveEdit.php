<?
function slide_management_form_saveEdit(){

if(! $id = $_REQUEST['id']){
		echo "err - ".__LINE__.__FUNCTION__;
	}else if(! $name = $_REQUEST['name']){
		?>
		<div class="error-p">فیلد نام الزامی است.</div>
		<?
	}else if(! $url = $_REQUEST['url']){
		?>
		<div class="error-p">فیلد آدرس الزامی است.</div>
		<?
	}else if($_FILES["file"]["error"]>0 && !$loc2 = $_REQUEST['img']) {
		?>
		<div class="error-p">فیلد تصویر الزامی است.</div>
		<?
	}else if (! $loc=fileupload("slider")) {
 		?>
		<div class="error-p">فایل آپلود نشد.</div>
		<?
 }elseif(! $rs = dbq("UPDATE `slider` SET `id`='{$id}',`name`='{$name}',`url`='{$url}',`location`='{$loc}' WHERE `id`='{$id}'")){
		echo "error on ".__FUNCTION__." at ".__LINE__;
	} else {
		?>
		<div class="ok-p">تغییرات با موفقیت ثبت شد.</div>
		<?	

	}
}
