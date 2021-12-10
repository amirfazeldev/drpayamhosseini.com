<?
function setting_rw( $slug=null ){

	#
	# all slug
	if(! $slug ){
		if(! $rs = dbq(" SELECT * FROM `setting` WHERE 1 ")){
			e();
		} else if(! dbn($rs) ){
			e();
		} else {
			while( $rw = dbf($rs) ){
				$rw_s[ $rw['slug'] ] = $rw;
			}
			return $rw_s;
		}
		
	#
	# this slug
	} else {
		if(! $rs = dbq(" SELECT * FROM `setting` WHERE `slug`='$slug' LIMIT 1 ")){
			e(__FUNCTION__,__LINE__,dbe());
		
		} else if( dbn($rs) != 1 ){
			e();

		} else if(! $rw = dbf($rs) ){
			e();

		} else {
			return $rw;
		}
	}
	
}




