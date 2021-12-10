<?
function cat_translate( $id , $fild='name' ){
	
	if(! $rs = dbq(" SELECT `{$fild}` FROM `cat` WHERE `id`='$id' LIMIT 1 ") ){
		echo "err".__LINE__;
	
	} else if( dbn($rs) != 1 ){
		return "";
	
	} else {
		return dbr( $rs, 0, 0 );
	}
}


