<?

# sam@gmail.com
# 2019/01/15
# 2.0

function slider_management_ordmove( $id , $operation ){
	
	if(!$rw = table("slider", $id)){
		e(__FILE__.__LINE__);
	
	} else {
		
		slider_ordfix();
		
		if($operation=="+"){
			$new_prio = $rw['prio'] + 1;
		
		} else {
			$new_prio = $rw['prio'] - 1;
		}

		$replacement_prio = $rw['prio'];
		
		#
		# check if its on edge
		if(!$rs0 = dbq(" SELECT COUNT(*) FROM `slider` WHERE `prio`='".$new_prio."' LIMIT 1 ")){
			e(__FILE__.__LINE__.dbe());
		
		} else if( dbr($rs0,0,0)==0 ){
			// its on edge
			return true;
		
		} else {
			#
			# havu
			dbq(" UPDATE `slider` SET `prio`='".$replacement_prio."' WHERE `prio`='".$new_prio."' LIMIT 1 ");
			#
			# the guy
			dbq(" UPDATE `slider` SET `prio`='".$new_prio."' WHERE `id`='".$id."' LIMIT 1 ");
		}
	}
}

function slider_ordfix(){
	
	if(!$rs = dbq(" SELECT * FROM `slider` WHERE 1 ORDER BY `prio` ")){
		e(__FILE__.__LINE__.dbe());
	
	} else {
		$prio = 1;
		while($rw = dbf($rs)){
			dbq(" UPDATE `slider` SET `prio`='$prio' WHERE `id`='".$rw['id']."' LIMIT 1 ");
			$prio++;
		}
	}
}