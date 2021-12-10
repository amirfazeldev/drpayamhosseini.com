<?
session_start();
$captchaText = strtoupper(substr(md5(microtime()), 0, 3));
  $_SESSION['code'] = $captchaText;

  $image = imagecreate(130, 50);
  $background = imagecolorallocatealpha($image, 239, 239, 239, 1);
  $textColor = imagecolorallocatealpha($image, 52, 166, 231, 1);
  $x = 10;
  $y = 30;
  
  for($i = 0; $i < 5; $i++) {
    $fontSize = mt_rand(30, 45);
    $text = substr($captchaText, $i, 1);
    imagettftext($image, $fontSize, 0, $x, $y, $textColor, './fonts/BEARPAW_-webfont.ttf', $text);
    
    $x = $x + 17 + mt_rand(0, 11);
    $y = mt_rand(30, 40);
  }
  
  header("Content-type: application/jpeg");
  imagejpeg($image);
  imagedestroy($image);

?>