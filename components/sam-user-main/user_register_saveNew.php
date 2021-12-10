<?
function user_register_saveNew(){

	if(! $name = mysql_prep($_REQUEST['name']) ){
		
		 ?>
		 <div class="error-p"> نام وارد نشده است</div>		
		<?

	} elseif(! $company = mysql_prep($_REQUEST['company']) ){
		
		 ?>
		 <div class="error-p"> نام شرکت وارد نشده است</div>		
		<?

	} elseif(! $email = mysql_prep($_REQUEST['email']) ){
		
		 ?>
		 <div class="error-p"> ایمیل وارد نشده است</div>		
		<?

	} elseif(! $tell = mysql_prep($_REQUEST['tell']) ){
		
		 ?>
		 <div class="error-p"> تلفن وارد نشده است</div>		
		<?

	} elseif(! $address = mysql_prep($_REQUEST['address']) ){
		
		 ?>
		 <div class="error-p"> آدرس وارد نشده است</div>		
		<?

	} elseif(! $cell = mysql_prep($_REQUEST['cell']) ){
		
		 ?>
		 <div class="error-p"> شماره همراه وارد نشده است</div>		
		<?

	} elseif(! $postal = mysql_prep($_REQUEST['postal']) ){
		
		 ?>
		 <div class="error-p"> کد ملی وارد نشده است</div>		
		<?

	} elseif(! $username = mysql_prep($_REQUEST['username']) ){
		
		 ?>
		 <div class="error-p"> نام کاربری وارد نشده است</div>		
		<?

	} elseif(! $password = mysql_prep($_REQUEST['password']) ){
		
		 ?>
		 <div class="error-p"> پسورد وارد نشده است</div>		
		<?

	} else if(! $password2 = mysql_prep($_REQUEST['password2']) ){
		/*echo "error on ".__FUNCTION__." at ".__LINE__;*/
		 ?>
		 <div class="error-p">تایید پسورد وارد نشده است</div>
		
		<?
	}else  if($password != $password2 ){
		
		?>
		 <div class="error-p"> تکرار رمز اشتباه است</div>		
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
			$passworderror=array();
			if (strlen($password)<8) {
				$passworderror[]='طول پسورد  باید حداقل  8 کارکتر باشد';
			}
			// if (!preg_match('/[A-Z]/', $password)) {
			// 	$passworderror[]='پسورد باید حداقل یک حرف بزرگ داشته باشد';
			// }
			// if (!preg_match('/[0-9]/', $password)) {
			// 	$passworderror[]='پسورد باید حداقل یک  عدد داشته باشد';
			// }
			$passworderrorcount=count($passworderror);
			if ($passworderrorcount) {
			?><div class="error-p"><?
				for ($i=0; $i <$passworderrorcount ; $i++) { 
					echo $passworderror[$i].'<br>';
				}
			?></div><?
			}else{

				$a="SELECT * FROM `users` WHERE `email`='".$email."'";
				$b=mysql_query($a);
				$c=mysql_num_rows($b);
				if($c>0){
					?>
				    <div class="error-p">ایمیل تکراری است</div>		
				    <?
				}else {
					$a="SELECT * FROM `users` WHERE `username`='".$username."'";
					$b=mysql_query($a);
					$c=mysql_num_rows($b);
					if($c>0){
						?>
					    <div class="error-p">نام کاربری تکراری است</div>		
					    <?
					}else {
						$salt=time();
						$hashed_password = sha1($password.$salt);
						$query = "INSERT INTO users(`name`, `company`, `email`, `tell`, `address`, `cell`, `postal`, `username`, `password`,`salt`, `flag`) VALUES ('{$name}','{$company}', '{$email}','{$tell}','{$address}','{$cell}','{$postal}','{$username}','{$hashed_password}','{$salt}','1')";
						$result = mysql_query($query);
						if ($result) {
							$_SESSION["log-user"]= mysql_insert_id();
							echo "<script>location.href='./?page=user-panel';</script>";
						?>
					    <!-- <div class="ok-p">کاربر با موفقیت ساخته شد</div> -->
					
					    <?
						} else {
						?>
					    <div class="error-p">کاربر نمی تواند ایجاد شود</div>
					
					    <?
							$message .= "<br />" . mysql_error();
						}
					}	
				}
			}	
		}else{
      		echo '<div class="error-p">You are spammer !</div>';
    	}	
	}
}