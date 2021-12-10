<?
function about_management_form_saveEdit(){
if(! $id = $_REQUEST['id']){
		echo "err - ".__LINE__.__FUNCTION__;
	}else if(! $description = $_REQUEST['description']){
		?>
		<div class="error-p">فیلد توضیحات الزامی است.</div>
		<?
	}else if(! $rs = dbq("UPDATE `about` SET `id`='{$id}',`description`='{$description}' WHERE `id`='{$id}'")){
		?>
		<div class="error-p">ثبت نشد.</div>
		<?
	} else {
		?>
		<div class="ok-p">تغییرات با موفقیت ثبت شد.</div>
		<?	

	}
}