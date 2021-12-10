<?
function setting_mg_saveEdit( $slug=null, $text=null ){

	# 
	# it wants all rich settings
	if(! $slug ){
		if(! $rs = dbq(" SELECT * FROM `setting` WHERE 1 ")){
			e(__FUNCTION__,__LINE__,dbe());
		
		} else if(! dbn($rs) ){
			e();
		
		} else {
			while( $rw = dbf($rs) ){
				$rw_s[ $rw['slug'] ] = $rw['text'];
			}
			return $rw_s;
		}

		return false;
	
	#
	# wants some specific record
	} else if( $text === null ){
		
		if(! $rs = dbq(" SELECT `text` FROM `setting` WHERE `slug`='$slug' LIMIT 1 ")){
			e(__FUNCTION__,__LINE__,dbe());
		
		} else if( dbn($rs) != 1 ){
			// e(__FUNCTION__,__LINE__,$slug);
			return false;

		} else if(! $rw = dbf($rs) ){
			e();

		} else {
			return $rw['text'];
		}
	
	#
	# wants to store some text in some slug
	} else if(! dbn(dbq(" SELECT * FROM `setting` WHERE `slug`='$slug' LIMIT 1 ")) ){
		dbq(" INSERT INTO `setting` (`slug`,`text`) VALUES ('$slug','$text') ");

	} else if(! dbq(" UPDATE `setting` SET `text`='$text' WHERE `slug`='$slug' LIMIT 1 ") ){
		e(__FUNCTION__,__LINE__,dbe());
	
	} else {
		return true;
	}
	
}
