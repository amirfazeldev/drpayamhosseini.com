<?

# jalal7h@gmail.com
# 2016/05/17
# 1.2

function cat_management_saveEdit(){
	
	$desc = strip_tags(@$_REQUEST['desc']);
	$slug = strip_tags(@$_REQUEST['slug']);
	if(! $name = $_REQUEST['name'] ){
		//
	
	} else if(! $id = $_REQUEST['id'] ){
		e();
	
	} else {

		dbs( 'cat', [ 'name'=>$name, 'desc'=>$desc ,'slug'=>$slug ], [ 'id'=>$id ] );

	}
}

