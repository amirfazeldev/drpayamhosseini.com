<?

# jalal7h@gmail.com
# 2016/10/05
# 1.0

function cat_fetch( $cat_name , $parent=0 ){

	if(! $rs = dbq(" SELECT * FROM `cat` WHERE `flag`='1' AND `cat`='$cat_name' AND `parent`='$parent' ORDER BY `prio` ASC ") ){
		e( __FUNCTION__, __LINE__, dbe() );
	
	} else if(! dbn($rs) ){
		return false;

	} else while( $rw = dbf($rs) ){
		$c[ $rw['id'] ] = $rw['name'];
	}
	
	return $c;
}


