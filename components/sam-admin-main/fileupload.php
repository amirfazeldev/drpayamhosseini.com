<?
function fileupload($folder='',$crop=false,$file='file')
{
$name=@$_FILES[$file]["name"];
$type2=@$_FILES[$file]["type"];
$size=@$_FILES[$file]["size"];
$tmp=@$_FILES[$file]["tmp_name"];
// $finfo = new finfo(FILEINFO_MIME_TYPE);
// $type2 = @$finfo->file($tmp);

	if(@$_FILES[@$file]["error"]>0)
	{
		if(! @$loc2 = $_REQUEST['img']) {
			return false;
		}else{		
			return @$loc2;
		}
	}
	else
	{
		if(is_uploaded_file($tmp))//آیا اچ تی تی پی ساپورت میکند
		{
			$ext=array("image/jpeg","image/jpg","image/png","image/gif");
			if(in_array($type2,$ext))
			{
				$filename=md5($name.microtime()).substr($name,-5,5);
				//reject overly long 2 byte sequences, as well as characters above U+10000 and replace with ?
					$filename = preg_replace('/[\x00-\x08\x10\x0B\x0C\x0E-\x19\x7F]'.
					 '|[\x00-\x7F][\x80-\xBF]+'.
					 '|([\xC0\xC1]|[\xF0-\xFF])[\x80-\xBF]*'.
					 '|[\xC2-\xDF]((?![\x80-\xBF])|[\x80-\xBF]{2,})'.
					 '|[\xE0-\xEF](([\x80-\xBF](?![\x80-\xBF]))|(?![\x80-\xBF]{2})|[\x80-\xBF]{3,})/S',
					 '0', $filename );
				$move=move_uploaded_file($tmp,"img/".$folder."/".$filename);
				if($move)
				{
				    $loc="img/".$folder."/".$filename;
				    $loc2=_URL.'/'.$loc;
				    $filenamecrop='crop'.$filename;
				    if ($crop) {
				    	$ext2=array("image/jpeg","image/jpg");
						if(in_array($type2,$ext2))
						{
				        $im = imagecreatefromjpeg($loc2);
				        $size = min(imagesx($im), imagesy($im));
							$im2 = imagecrop($im, ['x' => 0, 'y' => 0, 'width' => $size, 'height' => $size]);
							if ($im2 !== FALSE) {
							    ImageJpeg($im2,"img/".$folder."/".$filenamecrop);
							} 
				    	}else if($type2==="image/png")
						{
					        $im = imagecreatefrompng($loc2);
							$size = min(imagesx($im), imagesy($im));
							$im2 = imagecrop($im, ['x' => 0, 'y' => 0, 'width' => $size, 'height' => $size]);
							if ($im2 !== FALSE) {
							    imagepng($im2,"img/".$folder."/".$filenamecrop);
							} 
				    	}else if($type2==="image/gif")
						{
				        $im = imagecreatefromgif($loc2);
				        $size = min(imagesx($im), imagesy($im));
							$im2 = imagecrop($im, ['x' => 0, 'y' => 0, 'width' => $size, 'height' => $size]);
							if ($im2 !== FALSE) {
							    ImageGif($im2,"img/".$folder."/".$filenamecrop);
							} 
				    	}
				        
				    }                  					 
                   
				}
				else
				{
					$errors= "فایل مورد نظر آپلود نشد";

				}
			}
			else
			{
				$errors= "فایل شما مجاز نمی باشد";
			}
		}
		else
		{
			$errors= "http cant upload";
		}
	
	if (@$errors) {
		
		if(! @$loc2 = $_REQUEST['img']) {
			return false;
		}else{		
			return @$loc2;
		}
		
	}else{
	
		return @$loc;
	}
}
}