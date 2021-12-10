<?
function uplod_management_form_saveNew(){
if($_FILES["file"]["error"]>0) {
		?>
		<div class="error-p">فیلد تصویر الزامی است.</div>
		<?
	}else if (! $loc=fileupload("uplod")) {
 		?>
		<div class="error-p">فایل آپلود نشد.</div>
		<?
 }elseif(! $rs = dbq("INSERT INTO `uplod`(`file`) VALUES ('{$loc}')")){
		?>
		<div class="error-p">فایل ثبت نشد.</div>
		<?
	} else {
		?>
		<div class="ok-p">فایل با موفقیت ثبت شد.</div>
		<?	

	}
}
