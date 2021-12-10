<?

// child to parent

function cat_id_serial( $superChild ){
	
	while( 1 ){

		$serial[] = $superChild;

		if(! $rs = dbq(" SELECT `parent` FROM `cat` WHERE `id`='$superChild' LIMIT 1 ") ){
			e(__FUNCTION__,__LINE__);
		
		} else if(! dbn($rs) ){
			break;
		
		} else {
			$superChild = dbr($rs, 0, 0);
		}

		if( $superChild==0 ){
			break;
		}

	}
	
	return $serial;
}
