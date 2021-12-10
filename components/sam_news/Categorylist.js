function Categorylist() {
	var x = document.getElementById("mySelect").value;		 
	location.href='./?page=news&cat_id='+x;
}