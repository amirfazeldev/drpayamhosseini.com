<?

# jalal7h@gmail.com
# 2017/01/03
# 1.0

function news_link($rw){	
	$link = name_for_link( $rw['name'] , 80 );
	$link = _URL.'/news/'.$rw['id'].'/'.$link;	
	return $link;
}

function name_for_link( $name , $length=0 ){
	if($length > 0){
		$name = sub_string($name , 0 , $length);
	}
	$name = mb_ereg_replace('[^A-Za-z0-9آ-ی ]+','',$name);
	$name = trim($name);
	$name = str_replace("", "+", $name);
	$name = urlencode($name);
	return $name;
}

function sub_string($STR, $S, $V){	
	if(strlen($STR)<=($V-$S))return $STR;	
	$STR = substr($STR, $S, $V);
	$tmp = explode(' ', $STR);
	for($i=0,$STR='' ; $i<sizeof($tmp)-1; $i++)
		$STR.= ' '.$tmp[$i];
	return $STR;
}
