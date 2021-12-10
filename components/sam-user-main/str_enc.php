<?
function str_enc( $str ){
	for( $i=0; $i<strlen($str); $i++ ){
		$chr = $str[$i];
		// echo $chr." : ";
		$ord = ord( $chr );
		// echo $ord." : ";
		$hex = dechex( $ord );
		// echo $hex;
		// echo "<br>";
		$str_enc.= $hex;
	}
	return $str_enc;
}

function str_dec( $str ){
	for( $i=0; $i<strlen($str); $i+=2 ){
		$hex = $str[$i].$str[$i+1];
		// echo $hex." : ";
		$dec = hexdec( $hex );
		// echo $dec." : ";
		$chr = chr( $dec );
		// echo "<br>";
		$str_dec.= $chr;
	}
	return $str_dec;
}
