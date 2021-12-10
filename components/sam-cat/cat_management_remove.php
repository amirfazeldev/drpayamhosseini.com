<?

function cat_management_remove(){
	if(!$id = $_REQUEST['id']){
		;//echo __FUNCTION__.__LINE__;
	} else if(!dbq(" DELETE FROM `cat` WHERE `id`='$id' LIMIT 1 ")){
		echo dbe();
	}
}

