<?
function faq_management_form_saveNew(){
if(! $question = $_REQUEST['question']){
		?>
		<div class="error-p">فیلد سوال الزامی است</div>
		<?
	}else if(! $awnser = $_REQUEST['awnser']){
		?>
		<div class="error-p">فیلد جواب الزامی است</div>
		<?
	}elseif(! $rs = dbq("INSERT INTO `faq`(`question`, `awnser`,`flag`) VALUES ('{$question}','{$awnser}',1)")){
		?>
		<div class="error-p">سوال ثبت نشد</div>
		<?
	} else {
		?>
		<div class="ok-p">سوال با موفقیت ثبت شد</div>
		<?	

	}
}
