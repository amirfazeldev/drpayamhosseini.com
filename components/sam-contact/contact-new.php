<?php

function contact_new()

{

	if(! $name = mysql_prep($_REQUEST['name'])){

		?>

		 <div class="error-p">فیلد نام الزامی است</div>

		<?

	}else if(! $tell = mysql_prep($_REQUEST['tell'])){

		?>

		 <div class="error-p">فیلد تلفن اشتباه است</div>

		<?

	}else if (preg_match('/^((1-)?d{3}-)d{3}-d{4}$/', $tell)) {
        ?>

		 <div class="error-p">فیلد تلفن اشتباه است</div>

		<?
	}else if(! $email = @$_REQUEST['email']){

		?>

		 <div class="error-p">فیلدد ایمیل الزامی است</div>

		<?

	}else if(! $sub = mysql_prep($_REQUEST['sub'])){

		?>

		 <div class="error-p">فیلد موضوع الزامی است</div>

		<?

	}else if(! $text = mysql_prep($_REQUEST['text'])){

		?>

		 <div class="error-p">فیلد متن پیام الزامی  است</div>

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
        	$date=date('U');  
			$a="INSERT INTO `contact`(`name`, `tell`, `email`,`sub`, `text`,`date_created`) VALUES ('".$name."', '".$tell."', '".$email."','".$sub."', '".$text."','".$date."')";

			$b=mysql_query($a);

			if($b)

			{

				$to=setting_rw( "email" )['text'];

				$subject="سایت شمال تک";

				$message="نوشته جدید در ارتباط با ما سایت شمال تک";

				$from_email=

				mail($to, $subject, $message, $email);

			?>

			<div class="ok-p">پیام شما ارسال شد.</div>

			<?

			}

			else

			{

			?>

			<div class="error-p">متاسفانه پشام شما ارسال نشد، لطفا دباره امتحان کنید.</div>

			<?

			}

		}else{

          echo '<div class="error-p">You are spammer !</div>';

        }	

	}

}



?>