<?
function about_management_form_saveNew(){


	if(! $description = $_REQUEST['description']){
		?>
		<div class="error-p">فیلد توضیحات الزامی است.</div>
		<?
	}else if(! $rs = dbq("INSERT INTO `about`(`description`) VALUES ('{$description}')")){
		echo "error on ".__FUNCTION__." at ".__LINE__;
	} else {
		?>
		<div class="ok-p">اطلاعات با موفقیت ثبت شد.</div>
		<?	

	}
}
