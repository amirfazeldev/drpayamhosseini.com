<?

function cat_define_globals(){
	
	if( ! sizeof( $GLOBALS['cat_items'] ) ){
		return true;
	
	} else foreach($GLOBALS['cat_items'] as $k => $r){
		if($r[1]==true){
			$GLOBALS['cmp']['cat_management&l='.$k] = $r[0];
		}
	}
	
}

