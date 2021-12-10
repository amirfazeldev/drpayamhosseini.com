<?
# print_r( cat_display('cat') );
# echo cat_display('cat', false );

function cat_display( $cat , $is_array=true , $parent=0 , $str="" ){
	$query = " SELECT * FROM `cat` WHERE `cat`='$cat' AND `parent`='$parent' AND `flag`='1' ORDER BY `prio` ASC ";
	if(!$rs = dbq($query)){
		echo __FUNCTION__.__LINE__;
	} else if(!dbn($rs)){
		if($is_array){
			return array('id'=>$parent , 'str'=>$str);
		} else {
			return "<option value='$parent' >$str</option>";
		}
	} else while($rw = dbf($rs)){
		$c0 = cat_display($cat, $is_array, $rw['id'], ($str?$str." » ":"").$rw['name']);
#		if(!is_array($c0)){
#			continue;
#		} else 
		if(@ $c0['str']==''){
			continue;
		} else if($is_array){
			$GLOBALS['cat_display-array-'.$cat][$c0['id']] = $c0['str'];
		} else {
			@$c.= $c0;
		}
	}
	
	if($parent==0 and $is_array){
		return $GLOBALS['cat_display-array-'.$cat];
	} else {
		return @$c;
	}
}
