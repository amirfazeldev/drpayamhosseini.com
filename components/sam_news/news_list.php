<?php
function news()
{
  if($id = @$_REQUEST['id']){
    news_display();
  }else{    
  $q_cat = "`flag`=1";
  if ($tag = @$_REQUEST['tag']) {
    $q_cat="`tag`like '%".$_REQUEST['tag']."%'";
    $link = _URL."/?page=news&p=".$_REQUEST['p'];
    
  }
  if ($s = @$_REQUEST['s']) {
    $q_cat="`tag`like '%".$_REQUEST['s']."%' OR `name`like '%".$_REQUEST['s']."%'";
    $link = _URL."/?page=news&p=".$_REQUEST['p'];
    
  }
  # در صورت انتخواب گروه خبری در سلکت استفاده میشه
  if ($cat_id = @$_REQUEST['cat_id']) {
  
    # اگر Any انتخواب شده بود
    if ($cat_id == "Any") {
      $q_cat = "`flag`=1";
      $link = _URL."/?page=news&p=".$_REQUEST['p'];

    } else {
      $q_cat = "`cat`='$cat_id' AND `flag`=1";
      $link = _URL."/?page=news&cat_id=".$cat_id."&p=".$_REQUEST['p'];
    }
  
  } else {
    $link = _URL."/?page=news&p=".@$_REQUEST['p'];
  }

  # دسته خبری را از دیتابیس گرفته و در optionقرار میدهیم
    $rw = cat_display('news');
    foreach ($rw as $id => $name) {
    @$list_of_options_for_news_list.= "<option ".( $cat_id==$id? "selected" : "" )." value=\"".$id."\">".$name."</option>\n";
  } 
  
  $content = '<div class="contentnews">
  <h1 class="layoutheader">اخبار سایت</h1>
  <div class="news_list">
  <span>دسته بندی</span>
  <select id = "mySelect" onchange="Categorylist()">
    <option value = "Any">Any</option>
    '.$list_of_options_for_news_list.'
  </select>';
  
  # برای کنترل تعداد ستون ها استفاده میشه
  $i = 1; 
  
  # برای تنظیم دو ستونی شدن به کار میره
  $j = 0; 

  $tdd = 10;
  $stt = $tdd * intval(@$_REQUEST['p']); 
    $query1 = " SELECT * FROM `news` WHERE $q_cat ORDER BY `id` DESC LIMIT $stt , $tdd ";
    
    if(! $rs1 = dbq($query1) ){
    e();
  
  } else if(! dbn($rs1) ){
    $content.= '<p class="error_news">موردی یافت نشد.</p>';
  
  } else {
  		$GLOBALS['n']=20;
      while( $rw1 = dbf($rs1) ){

      $image = $rw1['pic'];
      
      # بررسی تصویر
      if (! $image ) {
        if ($i == 1) {
          $i = 2;
          $j = 0;
          $GLOBALS['n']=$GLOBALS['n']+5;
          # نمایش خبر بدون تصویر در یک ستون
          $content.= noimg1($rw1);

        } else {
          $j++;
          if($j == 2){
            $i = 1;
            $j = 0;
          }
          # نمایش خبر بدون تصویر در ستون دوم
          $GLOBALS['n']=$GLOBALS['n']+5;
          $content.= noimg2($rw1);
        }

      } else if( $i == 1 ){
        # اگر تصویر باشد و تکی نمایش دهد
        $i = 2;
        $GLOBALS['n']=$GLOBALS['n']+5;
      
      $content.= '<div class="news_list_content wow fadeInUp animated" data-wow-delay="0.'.$GLOBALS['n'].'s">
        <a href="'.news_link($rw1).'">
          <div class="news_list_text">
            <div class="news_list_tile">
              <span class="news_list__cat">'.cat_translate($rw1['cat']).'</span>
              <span class="news_list__date">'.vaght_2_taghvim(u2vaght($rw1["date_created"]),0,0,true).'</span>
              <p>'.$rw1['name'].'</p>
            </div>
          </div><div class="news_list_img">
            <img class="isss" src="'._URL.'/'.$image.'">
          </div>
          <div class="social2">'.seo_share( '24' , news_link($rw1) ).'</div>
        </a>
      </div>';
          
      } elseif ($i == 2) { // نمایش خبر ها در دو ستون
        $j++;
        if($j == 2){
          $i = 1;
          $j = 0;
        }
         $GLOBALS['n']=$GLOBALS['n']+5;
        $content.= two_news_list($rw1);
      }

    }# end while  
    $content.= listmaker_paging($query1, $link, $tdd, $debug=false);
    }# end else
  
  $content.= '</div></div>';
    echo $content;
}
}

# در صورت نداشتن تصویر این اجرا میشه
function noimg1($rw1){
  $noimg1="";
  $noimg1.= '<div class="noimg wow fadeInLeft animated" data-wow-delay="0.'.$GLOBALS['n'].'s">
    <a href="'.news_link($rw1).'">
      <div class="left">
        <span class="news_list__cat">'.cat_translate($rw1['cat']).'</span>
        <span class="news_list__date">'.vaght_2_taghvim(u2vaght($rw1["date_created"]),0,0,true).'</span>
      </div>
      <div class="right">
        <p>'.$rw1['name'].'</p>
      </div>
    </a>  
    <div class="social3">'.seo_share( '24' , news_link($rw1) ).'</div>
  </div>';

  return $noimg1;
  
}

# در صورت نداشتن تصویر و نمایش خبر در ستون دوم
$GLOBALS['news-counter']=0;
function noimg2( $rw1 ){
  
  $GLOBALS['news-counter']++;
  $noimg2="";  
  $noimg2.= '<div class="two_news_list_noimg wow fadeInRighet animated '.( $GLOBALS['news-counter'] %2 ? "first" : "second" ).'" data-wow-delay="0.'.$GLOBALS['n'].'s" >
    <a href="'.news_link($rw1).'">
      <div class="left">
        <span class="news_list__cat">'.cat_translate($rw1['cat']).'</span>
        <span class="news_list__date">'.vaght_2_taghvim(u2vaght($rw1["date_created"]),0,0,true).'</span>
        <p>'.$rw1['name'].'</p>
      </div>
      <div class="social2">'.seo_share( '24' , news_link($rw1) ).'</div>
    </a>      
  </div>';

  return $noimg2;

}

# خبرها در دو ستون نشان داده میشه
function two_news_list($rw1){
  
  $GLOBALS['news-counter']++;
  $two_news_list="";
  $two_news_list.= '<div class="two_news_list wow fadeInUp animated '.( $GLOBALS['news-counter'] %2 ? "first" : "second" ).'" data-wow-delay="0.'.$GLOBALS['n'].'s" >
    <a href="'.news_link($rw1).'">
      <div class="left">
        <span class="news_list__cat">'.cat_translate($rw1['cat']).'</span>
        <span class="news_list__date">'.vaght_2_taghvim(u2vaght($rw1["date_created"]),0,0,true).'</span>
        <p>'.$rw1['name'].'</p>
      </div><div class="news_list_2img">
        <img class="isss" src="'._URL.'/'.$rw1['pic'].'">
      </div>
      <div class="social2">'.seo_share( '24' , news_link($rw1) ).'</div>
    </a>      
  </div>';

  return $two_news_list;
  
}

    