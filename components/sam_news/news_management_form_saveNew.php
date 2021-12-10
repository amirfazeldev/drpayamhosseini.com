<?
function news_management_form_saveNew(){
$date=date('U');	
if(! $name = $_REQUEST['name']){
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
	}else if($_FILES["file"]["error"]>0) {
		?>
		<div class="error-p">فیلد تصویر الزامی است.</div>
		<?
	}else if (! $loc=fileupload("news")) {
 		?>
		<div class="error-p">فایل آپلود نشد.</div>
		<?
 }else{

		if ($tag=$_REQUEST['tag']) {
		 	$tag = str_replace( array( " " , "\r\n",",","،") , "\n" , $tag );
		} 	
	 	
	 	if(! $rs = dbq("INSERT INTO `news`(`name`, `cat`, `pic`,`text`,`tag`,`date_created`,`date_updated`,`flag`) VALUES ('{$name}','{$cat}','{$loc}','{$text}','{$tag}','{$date}','{$date}','1')")){
	 	// echo mysql_error();
			?>
			<div class="error-p">خبر ثبت نشد.</div>
			<?
		} else {
			?>
			<div class="ok-p">خبر با موفقیت ثبت شد.</div>
			<?	
            fun_rss();
		}
	}
}