<? 
function toggl_flag($table)
{
	if(! $rs = dbq(" SELECT * FROM `$table` WHERE `id`='".$_REQUEST['flag']."'")){
	    echo "error on ".__FUNCTION__." at ".__LINE__;
	    
	  } else{
	  	$id=$_REQUEST['flag'];
	  	$rw = dbf($rs);
	  	if ($rw["flag"]==0) {
	  		$flag="1";
	  	}else{
	  		$flag="0";
	  	}
	  	if(! $rs = dbq("UPDATE `$table` SET `flag`='{$flag}' WHERE `id`='{$id}'")){
		echo "error on ".__FUNCTION__." at ".__LINE__;
		}
	  }
}