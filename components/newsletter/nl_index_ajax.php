<?
$GLOBALS['do_action'][] = 'nl_index_ajax';
function nl_index_ajax()
{
	if( isset($_POST['newsmail']))
	{
		$newsmail=$_POST['newsmail'];
		if(!validate_email($newsmail))
		{
		echo '<p class="error_news">ایمیل شما قبلا ثبت شده است.</p>';
		die();
		 
		}else{
			nl_index_save($newsmail);
		}
	} else{
		return false;
	}

}