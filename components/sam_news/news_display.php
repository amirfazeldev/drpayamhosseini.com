<?php

# taghipoor.meysam@gmail.com
# 2017/01/29
# 1.1

function news_display(){
	
	# 
	# news display section
   
	if(! $rw = table( 'news', $_REQUEST['id'] ) ){
		d404();
	
	} else if( $rw['flag'] == 0 ){
		d404();
		e();

	} else {
		# آبدیت تعداد  بازدید
		$visit = dbinc( 'news', $_REQUEST['id'], 'visit' );
		$image = $rw['pic']; 
		$text = str_replace( "img/uplod" , _URL."/img/uplod" , $rw['text'] );
		$tag = $rw['tag'];
		$list_tag = explode( "\n" , $tag );
		$tag=display_list_tag($list_tag);
		$Proposal=display_list_Proposal($list_tag,$_REQUEST['id'],$rw['cat']);
		$new_news=new_news();
		$popular_news=popular_news();
		$tag_news=tag_news();
		$content = '
		<section class=" contentnews_display news_display_section">
		  <div class="news_display">
		  <div class="news_display_h1 wow fadeInUp animated" data-wow-delay="0.4"><h1>'.$rw['name'].'</h1></div>
			<div class="news_display_r">
				<div class="news_display_head wow fadeInRighet animated" data-wow-delay="0.3">
						<span class="news_display__cat"><a target="_blank" href="'._URL.'/?page=news&cat_id='.$rw['cat'].'">'.cat_translate($rw['cat']).'</a></span>
						<span class="news_display__date">'.vaght_2_taghvim(u2vaght($rw["date_created"]),0,0,true).'</span>
						<span class="news_display__visit">'.$visit.' بازدید </span>
						<div class="news_display_social wow fadeInUp animated" data-wow-delay="0.5">'.seo_share('24').'</div>
				</div>
			</div>
			<div class="news_display_l">			
			'.( $image ? '<div class="news_display_img wow fadeInUp animated" data-wow-delay="0.6"><img class="isss" src="'._URL.'/'.$image.'"></div>' : '').'	
				<div class="text wow fadeInUp animated" data-wow-delay="0.6">'.$text;
			#
			# tag
			if( $rw['tag']){
				$content.=$tag.'</div></div>';

			}else{
				$content.='</div></div>';
			}
			
			$content.='
				<h3 class="c-section-title"><span>مطالب پیشنهادی</span></h3>
				<div class="news_list_air">'.$Proposal.'</div>'; 

			#
			# comment section
// 			if( news_fbcomment_flag === true ){
// 	  			$content.='<h3 class="c-section-title"><span>ثبت نظر</span></h3>';
// 				$content.= fbcm( 'news' , intval($_REQUEST['id']) );
// 			}
			$content.='			 
	    </div>
		<div class="news_sidebar">
				<div id="search-2" class="widget widget_search">
					<form role="search" method="POST" class="search-form clearfix" action="'._URL.'/?page=news">
						<input type="search" class="search-field" placeholder="جستجو..." value="" name="s" autocomplete="off">
						<input type="submit" class="search-submit" value="جستجو">
					</form><!-- .search-form -->
				</div>
				<h3 class="c-section-title-s"><span>جدید ترین ها</span></h3>'.$new_news.'
				<h3 class="c-section-title-s"><span>محبوب ترین ها</span></h3>'.$popular_news.'
				<h3 class="c-section-title-s"><span>کلمات کلیدی </span></h3>'.$tag_news.'					
		</div>
		</section>';
	}

    echo @$content;

}

function dbinc( $table_name, $table_id, $field_name ){
	
	if(! dbq(" UPDATE `$table_name` SET `$field_name`=`$field_name` + 1 WHERE `id`='$table_id' LIMIT 1 ") ){
		e( dbe() );

	} else {
		return table( $table_name, $table_id, $field_name );
	}

	return false;

}
function display_list_tag($list_tag)
{
	$tag.="<div><i class=\"fa fa-tags\" aria-hidden=\"true\"></i><span>برچسب ها: </span>";
	$tag.="<ul class=\"c-list-categories\">";
	foreach ($list_tag as $tag2) 
		{
			if ($tag2) {
			$tag.="<li>";
			$tag.="<a href=\"";
			$tag.=_URL;
			$tag.="/?page=news&tag=";
			$tag.=$tag2; 
			$tag.="\"class=\"news-tag\">";
			$tag.=$tag2;
			$tag.="</li></a>";
			}		
		}
	$tag.="</ul>";
	$tag.="</div>";
		return $tag;	
}
function display_list_Proposal($list_tag, $id,$cat){
	foreach ($list_tag as $tag2) 
		{
		$q_cat.="`tag` like '%".$tag2."%' OR";	
		}
		
		$q_cat1 = substr($q_cat, 0, -3);
		$query1 = " SELECT * FROM `news` WHERE `flag`=1 AND `id`!='{$id}' AND ($q_cat1 OR `cat`='{$cat}') ORDER BY RAND() LIMIT 3 ";
    
    if(! $rs1 = dbq($query1) ){
    e();
  
  } else if(! dbn($rs1) ){
    $Proposal.= '<p class="error_news">موردی یافت نشد.</p>';
  
  } else {
      while( $rw1 = dbf($rs1) ){
      	$Proposal.='<div class="div_r">';
      	$Proposal.='<a href="'.news_link($rw1).'">';
      	 $Proposal.='<div class="log">';
          $Proposal.='<img class="" src="'._URL.'/'.$rw1['pic'].'">';
         $Proposal.='</div>';
      	$Proposal.='<p class="namenews">'.$rw1['name'].'</p>';
      	$Proposal.='<p class="card__time">دسته خبر: '.cat_translate($rw1['cat']).'</p>';
      	$Proposal.='<p class="card__time">تاریخ انتشار: '.vaght_2_taghvim(u2vaght($rw1["date_created"]),0,0,true).'</p>';
      	$Proposal.='</a>';
      	$Proposal.='</div>';
      }
   }
    return $Proposal;
}
function new_news()
{
	$query1 = " SELECT * FROM `news` WHERE `flag`=1 ORDER BY id DESC  LIMIT 5 ";
    
    if(! $rs1 = dbq($query1) ){
    e();
  
  } else if(! dbn($rs1) ){
    $new_news.= '<p class="error_news">موردی یافت نشد.</p>';
  
  } else {
      while( $rw1 = dbf($rs1) ){
      	$new_news.='<div class="div_r_n">';
      	$new_news.='<a href="'.news_link($rw1).'">';
      	 $new_news.='<div class="log">';
          $new_news.='<img class="" src="'._URL.'/'.$rw1['pic'].'">';
         $new_news.='</div>';
      	$new_news.='<p class="namenews">'.$rw1['name'].'</p>';
      	$new_news.='</a>';
      	$new_news.='</div>';
      }
   }
    return $new_news;
}
function popular_news()
{
	$query1 = " SELECT * FROM `news` WHERE `flag`=1 ORDER BY visit DESC  LIMIT 5 ";
    
    if(! $rs1 = dbq($query1) ){
    e();
  
  } else if(! dbn($rs1) ){
    $popular_news.= '<p class="error_news">موردی یافت نشد.</p>';
  
  } else {
      while( $rw1 = dbf($rs1) ){
      	$popular_news.='<div class="div_r_n">';
      	$popular_news.='<a href="'.news_link($rw1).'">';
      	 $popular_news.='<div class="log">';
          $popular_news.='<img class="" src="'._URL.'/'.$rw1['pic'].'">';
         $popular_news.='</div>';
      	$popular_news.='<p class="namenews">'.$rw1['name'].'</p>';
      	$popular_news.='</a>';
      	$popular_news.='</div>';
      }
   }
    return $popular_news;
}
function tag_news()
{
	$query1 = " SELECT * FROM `news` WHERE `flag`=1 ";
    
    if(! $rs1 = dbq($query1) ){
    e();
  
  } else if(! dbn($rs1) ){
    $tag.= '<p class="error_news">موردی یافت نشد.</p>';
  
  } else {
  	$num= mysql_num_rows($rs1);
  	for ($i=0; $i <$num ; $i++) { 
  		$rw1 = dbf($rs1);
  		$tags.=$rw1['tag'].',';
  	}
  	$tags = str_replace( array( " " , "\r\n",",","،") , "\n" , $tags );
	$list_tag = explode( "\n" , $tags );
	$list_tag = array_unique($list_tag);
	$tag.="<ul class=\"c-list-categories\">";
	foreach ($list_tag as $tag2) 
		{
			if ($tag2) {
			$tag.="<li>";
			$tag.="<a href=\"";
			$tag.=_URL;
			$tag.="/?page=news&tag=";
			$tag.=$tag2; 
			$tag.="\"class=\"news-tag\">";
			$tag.=$tag2;
			$tag.="</li></a>";
			}		
		}
	$tag.="</ul>";
	$tag.="</div>";
}	
		return $tag;
}