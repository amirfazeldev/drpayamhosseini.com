<?
function admin_logut_do(){
		
		// 2. Unset all the session variables
		$_SESSION = array();
		
		// 4. Destroy the session
		session_unset();
		session_destroy();
	
		echo "<script>location.href='./?page=admin';</script>";
		
}		

// class admin_login_do tu css ezafe beshe, va ye rango rui be farayande login dade beshe


