<?
function user_forgot_verify()
{
	?>
	<div class="content">
		<div class="register-part">
			<div class="register-part-logo"><img src="<?=_URL?>/img/card.png"></div>
			<br>
	<?
	if(! $email = mysql_prep($_REQUEST['email']) ){
		
		?>
		 <div class="error-p"> ایمیل وارد نشده است</div>
		 <br>
		    <a class="forgot" href="http://shomaltech.ir/forgot">برگشت</a>
		 <br>		
		<?

	} else{
	$a="SELECT * FROM `users` WHERE `email`='".$email."'";
		$b=mysql_query($a);
		$c=mysql_num_rows($b);
		if($c==0){
			?>
		    <div class="error-p">هیچ حساب کاربری با آدرس ایمیل مورد نظر شما ثبت نشده است.</div>
		    <br>
		    <a class="forgot" href="<?=_URL?>/forgot">برگشت</a>
		    <br><br>
		
		    <?
		}else {
			 $uniqidStr = md5(uniqid(mt_rand()));
			 if(! dbq(" UPDATE `users` SET `forgot_pass_identity`='".$uniqidStr."' WHERE `email`='".$email."' LIMIT 1 ") ){
		e( dbe() );

			} else {
				//send reset password email
				$email2=str_enc($email);
				$new=str_enc("new");

				$resetPassLink=_URL."/forgot/".$new."/".$email2."/".$uniqidStr;
				$resetPassLink2=_URL."/forgot/".$new."/".$email2;
                $to = $email;
                $subject = "پیام تایید آدرس ایمیل";
                $mailContent = 'با سلام<br>کاربر عزیز کد تایید ایمیل شما به شرح زیر است : <br>'.$uniqidStr.'
                <br/>لطفا برای تایید آدرس ایمیل خود کد بالا را در کادر مربوطه وارد نمائید.
                <br/>و یا اینکه بر روی لینک زیر کلیک کنید :<br> <a href="'.$resetPassLink.'">'.$resetPassLink.'</a>
                <br/><br/>';
                //set content-type header for sending HTML email
                $headers = "MIME-Version: 1.0" . "\r\n";
                $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
                //additional headers
                $headers .= 'From: shomal tech<info@shomaltech.ir>' . "\r\n";
                //send email
               if (mail($to,$subject,$mailContent,$headers)) {
                	// echo "<script>location.href='./?page=forgot&do=new&mail=$email2';</script>";
               		echo "<script>location.href='$resetPassLink2';</script>";

                }else{
                	?>
				    <div class="error-p">مشکلی ایجاد شده-مجدد امتحان کنید</div>
				    <?
                }
			
			}
		}	
	}
?>
</div>
</div>
<?		
}