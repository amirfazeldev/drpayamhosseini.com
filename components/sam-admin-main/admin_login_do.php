<?
function admin_login_do(){
	
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

	}else if(! $code = mysql_prep($_REQUEST['code']) ){
		/*echo "error on ".__FUNCTION__." at ".__LINE__;*/
		 ?>
		 <div class="error-p">کد وارد نشده است</div>		
		<?
	// }else if(! $captcha = mysql_prep($_REQUEST['g-recaptcha-response'])){
		/*echo "error on ".__FUNCTION__." at ".__LINE__;*/
		 ?>
		 <!-- <div class="error-p">کپچا چک نشده است</div> -->
		<?

	}else{ 
		// $response=file_get_contents("https://www.google.com/recaptcha/api/siteverify?secret=6LcqxkcUAAAAAG_yZPlQRnNn40-wn3lntuAqw_oO&response=".$captcha."&remoteip=".$_SERVER['REMOTE_ADDR']);
		// $responseData = json_decode($response);
		// if($responseData->success)
		if (1) {
			if( $code == __FC){
				$a="SELECT * FROM `users` WHERE `username`='".$username."' AND `status`=1 AND `flag`=1";
				$result=mysql_query($a);
				$c=mysql_num_rows($result);
				if($c>0){
					$row=mysql_fetch_array($result);
					$storedpassword=$row['password'];
					$salt=$row['salt'];
					$id=$row['id'];
					$hashpassword=sha1($password.$salt);

					if ($storedpassword != $hashpassword ) {
						?>
						 <div class="error-p">اطلاعات وارد شده صحیح نمی باشد</div>		
						<?
					}else{
						$_SESSION["log-adm"]= $id;
						echo "<script>location.href='./?page=admin';</script>";
						exit;
					}	
						
				}else{
					?>
					 <div class="error-p">اطلاعات وارد شده صحیح نمی باشد</div>		
					<?
				}
			}else{
         		 echo '<div class="error-p">اطلاعات وارد شده صحیح نمی باشد</div>';
        	}		
        }else{
			?>
			 <div class="error-p">You are spammer !</div>		
			<?
	    }
	}    
}
