<?

# sam@gmail.com
# 2018/09/05
# 2.0

function linkify_management_ordmove( $id , $operation ){
	
	if(!$rw = table("linkify", $id)){
		e(__FILE__.__LINE__);
	
	} else {
		
		$cat = $rw['cat'];
		$parent = $rw['parent'];
		linkify_ordfix( $cat, $parent );
		
		if($operation=="+"){
			$new_prio = $rw['prio'] + 1;
		
		} else {
			$new_prio = $rw['prio'] - 1;
		}

		$replacement_prio = $rw['prio'];
		
		#
		# check if its on edge
		if(!$rs0 = dbq(" SELECT COUNT(*) FROM `linkify` WHERE `cat`='".$cat."' AND `parent`='$parent' AND `prio`='".$new_prio."' LIMIT 1 ")){
			e(__FILE__.__LINE__.dbe());
		
		} else if( dbr($rs0,0,0)==0 ){
			// its on edge
			return true;
		
		} else {
			#
			# havu
			dbq(" UPDATE `linkify` SET `prio`='".$replacement_prio."' WHERE `cat`='".$cat."' AND `parent`='$parent' AND `prio`='".$new_prio."' LIMIT 1 ");
			#
			# the guy
			dbq(" UPDATE `linkify` SET `prio`='".$new_prio."' WHERE `cat`='".$cat."' AND `parent`='$parent' AND `id`='".$id."' LIMIT 1 ");
		}
	}
}

function linkify_ordfix( $cat, $parent=0 ){
	
	if(!$rs = dbq(" SELECT * FROM `linkify` WHERE `cat`='$cat' AND `parent`='$parent' ORDER BY `prio` ")){
		e(__FILE__.__LINE__.dbe());
	
	} else {
		$prio = 1;
		while($rw = dbf($rs)){
			dbq(" UPDATE `linkify` SET `prio`='$prio' WHERE `id`='".$rw['id']."' LIMIT 1 ");
			$prio++;
		}
	}
}






