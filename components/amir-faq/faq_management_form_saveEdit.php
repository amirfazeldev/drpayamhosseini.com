<?
function faq_management_form_saveEdit(){

if(! $id = $_REQUEST['id']){
		echo "err - ".__LINE__.__FUNCTION__;
	}else if(! $question = $_REQUEST['question']){
		?>
		<div class="error-p">فیلد سوال الزامی است</div>
		<?
	}else if(! $awnser = $_REQUEST['awnser']){
		?>
		<div class="error-p">فیلد جواب الزامی است</div>
		<?
	}elseif(! $rs = dbq("UPDATE `faq` SET `question`='{$question}',`awnser`='{$awnser}' WHERE `id`='{$id}'")){
		echo "error on ".__FUNCTION__." at ".__LINE__;
	} else {
		?>
		<div class="ok-p">تغییرات با موفقیت ثبت شد.</div>
		<?	

	}
}
