<?

# jalal7h@gmail.com
# 2016/12/03
# 1.0

function seo_share( $size="24", $link=null, $title="" ){

	$c = "<div class=\"seo_share\" style=\"font-size: ".$size."px;\">";

	if(! $link ){
		$link = _URL.$_SERVER['REQUEST_URI'];
	}
	
	$list['facebook'] = 'http://www.facebook.com/sharer/sharer.php?u='.urlencode($link);
	$list['twitter'] = 'http://twitter.com/share?url='.$link;
	$list['google-plus'] = 'http://plus.google.com/share?url='.$link;
	$list['pinterest'] = 'https://pinterest.com/pin/create/button/?url=&media='.urlencode($link).'&description='.urlencode($title);
	$list['linkedin'] = 'https://www.linkedin.com/shareArticle?mini=true&url='.urlencode($link).'&title='.urlencode($title).'&summary=&source=';

	foreach( $list as $class => $link ){
		$c.= "<a target=\"_blank\" href=\"$link\" title=\"".ucfirst($class)."\" class=\"fa fa-".$class."-square\" ><icon></icon></a>";
	}

	$c.= "</div>";

	return $c;

}


function seo_share_link( $link , $title="" ){
	return seo_share( $link, $title );
}





