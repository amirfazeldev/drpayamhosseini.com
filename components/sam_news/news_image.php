<?php

# jalal7h@gmail.com
# 2017/02/26
# 1.0

function news_image( $rw ){
	
	if( $rw['image'] ){
		return _URL.'/'.$rw['image'];
	
	} else {
		return _URL.'/image_list/news-not-found.jpg';
	}

}

