<?
$GLOBALS['do_action'][] = 'nl_management_emailList_download';

function nl_management_emailList_download(){

	if(! $rs = dbq(" SELECT `email` FROM `newsletter` WHERE 1 ORDER BY `email` ") ){
		e(__FUNCTION__ , __LINE__);
	} else {
		
		# 
		# header
		header("Content-Type: plain/text"); 
		header("Content-disposition: inline; filename=newsletter-email-list.txt");
		header("Pragma: no-cache"); 
		header("Expires: 0");
		
		# 
		# loop
		while( $rw = dbf($rs) ){
			if( $rw['email'] = trim($rw['email']) ){
				echo $rw['email'] . "\n";
			}
		}

	}

}








