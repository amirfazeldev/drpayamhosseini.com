<?
function validate_email($email)
{

	 $result=dbq("SELECT * FROM newsletter WHERE `email`='{$email}'LIMIT 1");


	if(dbn($result)==1)
	{
		return false;
	}
	else
	{
		return true;
	}
}