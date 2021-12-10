<?
function check_required_fields($required_array) {
	$field_errors = array();
	foreach($required_array as $fieldname) {
		if (!isset($_POST[$fieldname]) || (empty($_POST[$fieldname]))) { 
			$field_errors[] = $fieldname; 
		}
	}
	return $field_errors; 
}
//////////////////////////////////////////////////////////
function display_errors($error_array) {
	echo "<p class=\"errors\">";
	echo "لطفا فیلد های زیر را چک کنید:<br />";
	foreach($error_array as $error) {
		echo " " . $error . "-";
	}
	echo "</p>";
}