<?

$sourceImage = $_REQUEST['name'];



$thumbWidth = $_REQUEST['width'];
if (substr($sourceImage,-3,3)=="png") {
	$original = imagecreatefrompng($sourceImage);
	}elseif (substr($sourceImage,-3,3)!="png") {
$original = imagecreatefromjpeg($sourceImage);
	}



$dims = getimagesize($sourceImage);
if ($dims[0]==$dims[1]) {
	$thumbHeight=$thumbWidth;
}else if ($dims[0]>$dims[1]) {
	$i=$dims[0]-$dims[1];

	$temp=($i/$dims[0])*$thumbWidth;
		$thumbHeight=$thumbWidth-$temp;	
}else if ($dims[0]<$dims[1]) {
	$i=$dims[1]-$dims[0];

	$temp=($i/$dims[0])*$thumbWidth;
		$thumbHeight=$thumbWidth+$temp;	

}
else{$thumbWidth=$dims[0];}

$thumb = imagecreatetruecolor($thumbWidth , $thumbHeight);
imagecopyresampled( $thumb, $original, 0, 0, 0, 0,
$thumbWidth, $thumbHeight, $dims[0], $dims[1] );
 header('Content-type: image/jpeg');
  		

imagejpeg($thumb);
