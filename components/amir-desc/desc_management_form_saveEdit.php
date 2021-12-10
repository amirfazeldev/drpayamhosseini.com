<?
function desc_management_form_saveEdit(){
if(! $id = $_REQUEST['id']){
		echo "err - ".__LINE__.__FUNCTION__;
	}else if(! $title = $_REQUEST['title']){
		?>
		<div class="error-p">فیلد عنوان  الزامی است.</div>
		<?
	}else if(! $description = $_REQUEST['description']){
		?>
		<div class="error-p">فیلد توضیحات الزامی است.</div>
		<?
	}else if($_FILES["file"]["error"]>0 && !$loc2 = $_REQUEST['img']) {
		?>
		<div class="error-p">فیلد تصویر الزامی است.</div>
		<?
	}else if (! $loc=fileupload("about")) {
 		?>
		<div class="error-p">فایل آپلود نشد.</div>
		<?
 }else if(! $rs = dbq("UPDATE `description` SET `id`='{$id}',`title`='{$title}',`description`='{$description}',`img`='{$loc}' WHERE `id`='{$id}'")){
		?>
		<div class="error-p">ثبت نشد.</div>
		<?
	} else {
		?>
		<div class="ok-p">تغییرات با موفقیت ثبت شد.</div>
		<?	

	}
}