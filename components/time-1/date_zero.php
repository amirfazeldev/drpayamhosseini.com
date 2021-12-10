<?

function date_zero( $action , $date ){

	$date = explode('/', $date);

	switch( $action ){
		
		case 'add':
			if( $date[1] < 10 ){
				$date[1] = "0".intval($date[1]);
			}
			if( $date[2] < 10 ){
				$date[2] = "0".intval($date[2]);
			}
			break;

		case 'remove':
			$date[1] = intval($date[1]);
			$date[2] = intval($date[2]);
			break;

	}

	$date = implode('/', $date);

	return $date;
}

