<?
function do_website()
{
if(@$_REQUEST['page']=='admin'){
	do_website_admin();
} elseif(@$_REQUEST['page']=='user-panel'){
	// va age na, yani index ro mikhaim bebinim,
	if (setting_rw( "webstatus_main" )['text']==0 && !$_SESSION['log-adm']) {
	// وبسایت در حال آماده سازی
	    construction();
	}else{

	do_website_user();
}
} else {
	// va age na, yani index ro mikhaim bebinim,
	if (setting_rw( "webstatus_main" )['text']==0 && !$_SESSION['log-adm']) {
	 //وبسایت در حال آماده سازی   
	    construction();
	}else{
	 do_website_index();
	}
}	
}
function do_website_admin()
{
	html_header_admin();
	do_admin();
	html_footer_admin();
}
function do_website_user()
{
	html_header();
	do_user();
	html_footer();
}
function do_website_index()
{
	html_header();
	do_index();
	html_footer();
}