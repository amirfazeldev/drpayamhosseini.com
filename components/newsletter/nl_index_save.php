<?

function nl_index_save($newsmail){

	
	if(!$newsmail){
		e( __FUNCTION__ , __LINE__ );
	}else if(! dbq(" INSERT INTO `newsletter` (`email`,`flag`) VALUES ('$newsmail',1) ") ){
		e( __FUNCTION__ , __LINE__ );
	} else {
		echo 'ثبت با موفقیت انجام شد';
	}
		
}

