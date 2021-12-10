<?
function linkify_cat_management_form_saveNew(){
$haveIcon=$_REQUEST['haveIcon']	;
$haveSub=$_REQUEST['haveSub']	;
if(! $name = $_REQUEST['name']){
		?>
		<div class="error-p">فیلد عنوان الزامی است.</div>
		<?
	}elseif(! $rs = dbq("INSERT INTO `linkify_config`(`name`, `haveSub`, `haveIcon`,`flag`) VALUES ('{$name}','{$haveSub}','{$haveIcon}',1)")){
		?>
		<div class="error-p"> ثبت نشد.</div>
		<?
	} else {
		?>
		<div class="ok-p"> با موفقیت ثبت شد.</div>
		<?	

	}
}
