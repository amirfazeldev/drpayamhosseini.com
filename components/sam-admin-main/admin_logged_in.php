<?
function admin_logged_in(){
	if(@$_SESSION['log-adm'] ){
		return true;
	} else {
		return false;
	}
}

// in tabe harja ke niaz mishe check konim admin login shode ya na , be kar miad.

