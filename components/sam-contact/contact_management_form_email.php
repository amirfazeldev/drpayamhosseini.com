<?
function contact_management_form_email(){


	if( ! admin_logged_in() ){
    return admin_login_form();
  } if(! $id = $_REQUEST['id']){
	 	echo "err - ".__LINE__.__FUNCTION__;
	 }else if(! $to = $_REQUEST['to']){
	 	echo "err - ".__LINE__.__FUNCTION__;
	 }else if(! $subject = $_REQUEST['subject']){
	 	echo "err - ".__LINE__.__FUNCTION__;
	 }else if(! $message1 = $_REQUEST['message']){
	 	echo "err - ".__LINE__.__FUNCTION__;
	 }
	$from_name = 'شمال تک';
	$from_email = 'info@shomaltech.ir';

	$message = '<html><body>';
	$message .= '<table rules="all" style="border-color: #666;" cellpadding="10">';
	$message .= "<tr style='background: #eee;'><td>'".$message1."'</td></tr>";
	$message .= "</table>";
	$message .= "</body></html>";

	if(html_mail($to, $subject, $message, array('from_email' => $from_email, 'from_name' => $from_name))){
		if(! $rs = dbq("UPDATE `contact` SET `backtext`='{$message1}' WHERE `id`='{$id}'")){
		echo "error on ".__FUNCTION__." at ".__LINE__;
	    }
		?><div class="ok-p">پیام شما ارسال شد.</div><?
	}else{
		?><div class="error-p">متاسفانه  پیام شما ارسال نشد، لطفا دباره امتحان کنید.</div><?
	}
}

function html_mail($to, $subject, $message, $options)
{
    if(isset($options['from_name']))
    {
        $headers = "From: " . $options['from_name'] . "<".$options['from_email'].">" . "\r\n";
    }
    //$headers .= "Reply-To: ". strip_tags($_POST['req-email']) . "\r\n";
    $headers .= "CC: info@shomaltech.ir\r\n";
    $headers .= "MIME-Version: 1.0\r\n";
    $headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n"; 

    if (mail($to, $subject, $message, $headers)){
    	return 1;
    }else{
    	return 0;
    }
}