<?
function user_logged_in(){
	if( $user_id=@$_SESSION['log-user'] || $user_id=@$_SESSION["log-adm"] ){
		return $user_id;
	} else {
		return false;
	}
}

// function user_logged(){
	
// 	if( $user_id = $_SESSION[ login_key()['uid'] ] ){
// 		return $user_id;
	
// 	} else {
// 		return false;
// 	}
	
// }


