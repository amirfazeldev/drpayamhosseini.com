<?
function fun_rss()
{
//تعریف تگ های اصلی
$rss_feed = '<?xml version="1.0" encoding="utf-8"?>';
$rss_feed .= '<rss version="2.0">';
$rss_feed .= '<channel>';
$rss_feed .= '<title>'.setting_rw( "main_title" )['text'].'</title>';
$rss_feed .= '<link>'._URL.'</link>' . "\n";
$rss_feed .= '<description>'.setting_rw('description')['text'].'</description>';
$rss_feed .= '<language>fa-IR</language>';
$rss_feed .= '<copyright>Copyright (C) ' . date('Y') .' '._URL.'</copyright>' . "\n";

    //انتخاب مطالب از پایگاه داده
    $query1 = "SELECT * FROM news WHERE `flag` = 1 ORDER BY `id` DESC LIMIT 10";
    if(! $rs = dbq($query1)){

    echo "error on ".__FUNCTION__." at ".__LINE__;

  } else if( mysql_num_rows($rs)<1){

    ?><div class="convbox">هنوز موردی ثبت نشده است </div><?

  }else{//else1

    //استفاده از اطلاعات پایگاه داده در حلقه
    while($row = dbf($rs) ){
        $id = $row['id'];
        $title = $row['name'];
        $description = $row['text'];
    
        //ایجاد خروجی استاندارد و تبدیل کاراکترهای غیر مجاز
        $title = htmlspecialchars($title, ENT_QUOTES, 'UTF-8');
        $description = htmlspecialchars($description, ENT_QUOTES, 'UTF-8');
    
        //تبدیل تاریخ دیتابیس به تاریخ استاندار (با فرض اینکه تاریخ دیتابیس با نمونه فرمت 00-00-00 22-12-1999 ذخیره شده باشد.)
        $date = $row['date_created'];
        // $array = explode('-', $date);
        // $date = mktime(0, 0, 0, intval($array[1]), intval($array[2]), intval($array[0]));
        //$convert = date("D, j M Y", $date);
        //$convert =gmdate('Y/m/d H:i:s',$date);
        $convert=vaght_2_rss(u2vaght($date));
        $date = $convert.' '.'GMT';
    
        //تعریف لینک خروجی
        $link = news_link($row);
    
        //ایجاد آیتم ها برای فید
        $rss_feed .= '<item>';
        $rss_feed .= '<title>' . $title . '</title>';
        $rss_feed .= '<description>' . $description . '</description>';
        $rss_feed .= '<link>' . $link . '</link>';
        $rss_feed .= '<pubDate>' . $date . '</pubDate>';
        $rss_feed .= '<author>'.setting_rw( "email" )['text'].'</author>';
        //$rss_feed .= '<source url="http://yoursite.com/rss.xml">فید آر اس اس سایت</source>' . "\n";
        $rss_feed .= '</item>';
    }

    $rss_feed .= '</channel>';
    $rss_feed .= '</rss>';

    //نوشتن اطلاعات در فایل خروجی
    $file ='rss.xml';
    //chmod($file, 0755);
    $file_handle = fopen($file, 'w+') 
    or die('خطا: سطح دسترسی برای ویرایش فایل در سرور تنظیم نیست!');
    $string_data = $rss_feed;
    fwrite($file_handle, $string_data);
    fclose($file_handle);
}//else1
}