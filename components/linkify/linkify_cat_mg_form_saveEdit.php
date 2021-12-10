<?
function linkify_cat_management_form_saveEdit(){
$haveIcon=$_REQUEST['haveIcon']	;
$haveSub=$_REQUEST['haveSub']	;
if(! $id = $_REQUEST['id']){
		echo "err - ".__LINE__.__FUNCTION__;
	}else if(! $name = $_REQUEST['name']){
		?>
		<div class="error-p">فیلد عنوان الزامی است.</div>
		<?
	}elseif(! $rs = dbq("UPDATE `linkify_config` SET `id`='{$id}',`name`='{$name}',`haveIcon`='{$haveIcon}',`haveSub`='{$haveSub}' WHERE `id`='{$id}'")){
		echo "error on ".__FUNCTION__." at ".__LINE__;
	} else {
		?>
		<div class="ok-p">تغییرات با موفقیت ثبت شد.</div>
		<?	

	}
}
