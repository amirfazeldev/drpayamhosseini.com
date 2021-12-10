<?
function do_action(){		
	if(@!$_REQUEST['do_action']){
		return false;
	} else foreach($GLOBALS['do_action'] as $k=>$do_action){
		if($do_action==$_REQUEST['do_action']){
			call_user_func($do_action);
			break;
		}
	}
	die();
}

