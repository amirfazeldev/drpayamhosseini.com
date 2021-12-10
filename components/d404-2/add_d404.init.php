<?php

# jalal7h@gmail.com
# 2017/01/03
# 1.0

// add_d404( '52,news,id' );
// add_d404( '52,item,id,active_flag' );

function add_d404( $query ){
	
	if( $GLOBALS['d404'] and in_array( $query, $GLOBALS['d404'] ) ){
		//

	} else {
		$GLOBALS['d404'][] = $query;
	}

}

