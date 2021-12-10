<?
function table($tableName, $id=null, $fieldName=null, $idFieldName="id"){
	if(!$rs = dbq(" SELECT ".($fieldName?"`$fieldName`":"*")." FROM `$tableName` 
		WHERE ".($id==null?'1':"`$idFieldName`='$id' LIMIT 1")." ")){
		echo "err - table - $tableName, $id, $fieldName";
		echo mysql_error();
	} else if(mysql_num_rows($rs)!=1){
		//echo "error - no record found on table $tableName:$id:$fieldName";
		return false;
	} else {
		if($fieldName){
			return mysql_result($rs, 0, 0);
		} else {
			return mysql_fetch_assoc($rs);
		}
	}
}
function table1($tableName, $fieldName=null, $shart=null){
	if(!$rs = dbq(" SELECT ".($fieldName?"`$fieldName`":"*")." FROM `$tableName` 
		WHERE ".($shart==null?'1':$shart)." ")){
		echo "err - table - $tableName, $fieldName";
		echo mysql_error();
	} else if(mysql_num_rows($rs)!=1){
		//echo "error - no record found on table $tableName:$id:$fieldName";
		return false;
	} else {
		if($fieldName){
			return mysql_result($rs, 0, 0);
		} else {
			return mysql_fetch_assoc($rs);
		}
	}
}
function table2($tableName, $fieldName=null, $shart=null){
	if(!$rs = dbq(" SELECT ".($fieldName?"$fieldName":"*")." FROM `$tableName` 
		WHERE ".($shart==null?'1':$shart)." ")){
		echo "SELECT ".($fieldName?"`$fieldName`":"*")." FROM `$tableName` 
		WHERE ".($shart==null?'1':$shart)."";
		echo mysql_error();
	} else if(mysql_num_rows($rs)!=1){
		//echo "error - no record found on table $tableName:$id:$fieldName";
		return false;
	} else {
		if($fieldName){
			return mysql_result($rs, 0, 0);
		} else {
			return mysql_fetch_assoc($rs);
		}
	}
}
