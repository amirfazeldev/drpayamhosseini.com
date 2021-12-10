<?
function desc_management_form_saveNew(){

	if(! $title = $_REQUEST['title']){
		?>
		<div class="error-p">فیلد عنوان  الزامی است.</div>
		<?
	}if(! $description = $_REQUEST['description']){
		?>
		<div class="error-p">فیلد توضیحات الزامی است.</div>
		<?
	}else if($_FILES["file"]["error"]>0) {
		?>
		<div class="error-p">فیلد تصویر الزامی است.</div>
		<?
	}else if (! $loc=fileupload("about")) {
 		?>
		<div class="error-p">فایل آپلود نشد. لطفا مجدد امتحان کنید</div>
		<?
 }else if(! $rs = dbq("INSERT INTO `description`(`title`,`description`, `img`) VALUES ('{$title}','{$description}','{$loc}')")){
		echo "error on ".__FUNCTION__." at ".__LINE__;
	} else {
		?>
		<div class="ok-p">اطلاعات با موفقیت ثبت شد.</div>
		<?	

	}
}
