<?
function work_management_form_saveNew(){
if(! $name = $_REQUEST['name']){
		?>
		<div class="error-p">فیلد نام الزامی است.</div>
		<?
	}else if(! $url = $_REQUEST['url']){
		?>
		<div class="error-p">فیلد آدرس الزامی است.</div>
		<?
	}else if(! $cat_id = $_REQUEST['cat_id']){
		?>
		<div class="error-p">فیلد نوع نمونه کار الزامی است.</div>
		<?
	}else if($_FILES["file"]["error"]>0) {
		?>
		<div class="error-p">فیلد تصویر الزامی است.</div>
		<?
	}else if (! $loc=fileupload("work")) {
 		?>
		<div class="error-p">فایل آپلود نشد.</div>
		<?
 }elseif(! $rs = dbq("INSERT INTO `portfolio`(`name`,`cat_id`, `url`, `image`,`flag`) VALUES ('{$name}','{$cat_id}','{$url}','{$loc}',1)")){
		?>
		<div class="error-p">اسلاید ثبت نشد.</div> 
		<?
	} else {
		?>
		<div class="ok-p">اسلایدر با موفقیت ثبت شد.</div>
		<?	

	}
}
