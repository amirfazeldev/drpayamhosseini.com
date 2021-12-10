<?
function linkify_management_form_saveNew()
{
	if(! $rs2 = dbq(" SELECT * FROM `linkify_config` WHERE `id`='".$_REQUEST['cat']."' ")){
			    echo "error on ".__FUNCTION__." at ".__LINE__;
			  } elseif($rw2 = dbf($rs2)){
			  	if (@$rw2["haveIcon"]) {
			  		if (! $img=fileupload("linkify")) {
				 		?>
						<div class="error-p">فایل آپلود نشد.</div>
						<?
					 }
			  	}else{$img="";}
			  }
	if(! $parent = $_REQUEST['parent']){
		$parent=0;
	}		  
	if(! $cat = $_REQUEST['cat']){
		?>
		<div class="error-p">دسته نا معتبر.</div>
		<?
	}elseif(! $name = $_REQUEST['name']){
		?>
		<div class="error-p">فیلد عنوان الزامی است.</div>
		<?
	}elseif(! $url = $_REQUEST['url']){
		?>
		<div class="error-p">فیلد آدرس پیوند الزامی است.</div>
		<?
	}elseif(! $rs = dbq("INSERT INTO `linkify`(`name`, `url`, `img`,`cat`, `parent`,`flag`) VALUES ('{$name}','{$url}','{$img}','{$cat}','{$parent}',1)")){
		echo $name.'<br>'.$url.'<br>'.$img.'<br>'.$cat.'<br>'.$parent;
		?>
		<div class="error-p"> 1ثبت نشد.</div>
		<?
	} else {
		?>
		<div class="ok-p"> با موفقیت ثبت شد.</div>
		<?	

	}
}