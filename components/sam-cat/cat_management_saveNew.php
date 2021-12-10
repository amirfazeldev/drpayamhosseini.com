<?

function cat_management_saveNew(){
	
	#
	# checking for variables
	$c = $_REQUEST['t'];
	$parent = intval($_REQUEST['parent']);
	$desc = strip_tags(@$_REQUEST['desc']);
	$slug = strip_tags(@$_REQUEST['slug']);

	#
	# trying to put it into db
	if(! $name = $_REQUEST['name'] ){
		return false;
	
	} else if(! dbs( 'cat', ['name'=>$name,'desc'=>$desc,'slug'=>$slug,'cat'=>$c,'parent'=>$parent,'flag'=>1])){
		echo "not";
	}

}

