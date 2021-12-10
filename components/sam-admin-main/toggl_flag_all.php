<?
function toggl_flag_all($table,$cat)
{
	if(! $rs = dbq(" SELECT * FROM `$table` WHERE `cat`='".$cat."'")){
	    echo "error on ".__FUNCTION__." at ".__LINE__;
	    
	  } else{
	  	while( $rw = dbf($rs) ){
		  	$id=$rw['id'];
		  	if ($rw["flag"]==0) {
		  		$flag="1";
		  	}else{
		  		$flag="0";
		  	}
		  	if(! $rs1 = dbq("UPDATE `$table` SET `flag`='{$flag}' WHERE `id`='{$id}'")){
			echo "error on ".__FUNCTION__." at ".__LINE__;
			}
		}	
	  }
}