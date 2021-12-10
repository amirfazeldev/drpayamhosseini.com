<?
function news_management_form_saveEdit(){
$date=date('U');
if(! $id = $_REQUEST['id']){
		echo "err - ".__LINE__.__FUNCTION__;
	}else if(! $name = $_REQUEST['name']){
		?>
		<div class="error-p">فیلد نام الزامی است.</div>
		<?
	}else if(! $cat = $_REQUEST['cat_id']){
		?>
		<div class="error-p">فیلد دسته خبر الزامی است.</div>
		<?
	}elseif(! $text = $_REQUEST['text']){
		?>
		<div class="error-p">فیلد توضیحات الزامی است.</div>
		<?
	}else if($_FILES["file"]["error"]>0 && !$loc2 = $_REQUEST['img']) {
		?>
		<div class="error-p">فیلد تصویر الزامی است.</div>
		<?
	}else if (! $loc=fileupload("news")) {
 		?>
		<div class="error-p">فایل آپلود نشد.</div>
		<?
 }else{

 		if ($tag=$_REQUEST['tag']) {
		 	$tag = str_replace( array( " " , "\r\n",",","،" ) , "\n" , $tag );
		} 	
		if(! $rs = dbq("UPDATE `news` SET `name`='{$name}',`text`='{$text}',`pic`='{$loc}',`cat`='{$cat}',`tag`='{$tag}',`date_updated`='{$date}' WHERE `id`='{$id}'")){
		echo "error on ".__FUNCTION__." at ".__LINE__;
		} else {
			?>
			<div class="ok-p">تغییرات با موفقیت ثبت شد.</div>
			<?
			fun_rss();
		}
   }	
}
