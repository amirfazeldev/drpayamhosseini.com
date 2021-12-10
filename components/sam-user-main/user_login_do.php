<?
function user_login_do(){
	
	if(! $username = mysql_prep($_REQUEST['username']) ){
		/*echo "error on ".__FUNCTION__." at ".__LINE__;*/
		 ?>
		 <div class="error-p">نام کاربری  وارد نشده است</div>
		
		<?
	} else if(! $password = mysql_prep($_REQUEST['password']) ){
		/*echo "error on ".__FUNCTION__." at ".__LINE__;*/
		?>
		 <div class="error-p">رمز عبور وارد نشده است</div>
		
		<?

	}else if(! $captcha = mysql_prep($_REQUEST['g-recaptcha-response'])){
		/*echo "error on ".__FUNCTION__." at ".__LINE__;*/
		 ?>
		 <div class="error-p">کپچا چک نشده است</div>
		
		<?

	}else{
		
		$response=file_get_contents("https://www.google.com/recaptcha/api/siteverify?secret=6LcqxkcUAAAAAG_yZPlQRnNn40-wn3lntuAqw_oO&response=".$captcha."&remoteip=".$_SERVER['REMOTE_ADDR']);
		$responseData = json_decode($response);
        if($responseData->success)
        {
			
			$a="SELECT * FROM `users` WHERE `username`='".$username."'";
			$result=mysql_query($a);
			$c=mysql_num_rows($result);
			if($c<1){
				?>
				 <div class="error-p">کاربری با این مشخصات یافت نشد</div>	
				<?
			}else{
				$row=mysql_fetch_array($result);
				$storedpassword=$row['password'];
				$salt=$row['salt'];
				$flag=$row['flag'];
				$id=$row['id'];
				$hashpassword=sha1($password.$salt);

				if ($storedpassword != $hashpassword ) {
					?>
					 <div class="error-p">کاربری با این مشخصات یافت نشد</div>	
					<?
				}else if ($flag != 1) {
					?>
				 <div class="error-p">پروفایل شما توسط مدیریت تایید نشده است!</div>	
					<?
				}else{
						$_SESSION["log-user"]= $id;			
						echo "<script>location.href='./?page=user-panel';</script>";
						exit;
				}
			}
		}else{
          echo '<div class="error-p">You are spammer !</div>';
        }	
    }
}
