<?
function user_forgot_save()
{
?>
<div class="content">
		<div class="register-part">
			<div class="register-part-logo"><img src="<?=_URL?>/img/card.png"></div>
			<br>
<div class="forgot-head">
    <h1 class="head">بازیابی کلمه عبور!</h1>
	<div class="text">لطفا بمنظور تنظیم مجدد کلمه عبور، کلمه عبور جدید را وارد کنید</div>
    </div>
<?	
	if (!$idcod=$_REQUEST['idcod']) {
		?>
		 <div class="error-p"> کد وارد نشده است</div>
		 <br>
		    <a class="forgot" href="<?=_URL?>/forgot">برگشت</a>
		 <br>		
		<?
	}elseif(! $email = mysql_prep(str_dec($_REQUEST['email']))){
		
		?>
		 <div class="error-p"> ایمیل وارد نشده است</div>
		 <br>
		    <a class="forgot" href="<?=_URL?>/forgot">برگشت</a>
		 <br>		
		<?

	} else{
		$a="SELECT * FROM `users` WHERE `email`='".$email."' AND `forgot_pass_identity`='".$idcod."'";
		$b=mysql_query($a);
		$c=mysql_num_rows($b);
		if($c>0){
			user_forget_cheng_pass($email,$idcod);
				
			}else{
				?>
			 <div class="error-p">کد وارد شده صحیح نمی باشد!</div>	
				<?
			}
	}
?>
</div>
</div>
<?	
}
function user_forget_cheng_pass($email,$idcod)
{
?>
<form class="" method="post" action="<?=_URL?>/forgot">
			<input type="hidden" name="do" value="chang">
			<input type="hidden" name="email" value="<?=$email?>">
			<input type="hidden" name="idcod" value="<?=$idcod?>">
			<input type="password" class="user-panel-input" value="" placeholder="پسورد جدید" name="password1"><br>
			<input type="password" class="user-panel-input" value="" placeholder="تکرار پسورد جدید" name="password2"><br>
			<br>
			<input type="submit" class="register-submit btn btn-primary" value="ارسال" name="btn">
		</form>
<?
}
function user_forgot_changepassword_saveEdit()
{
	if (!$idcod=$_REQUEST['idcod']) {
		?>
		 <div class="error-p"> کد وارد نشده است</div>
		 <br>
		    <a class="forgot" href="<?=_URL?>/forgot">برگشت</a>
		 <br>		
		<?
	}elseif(! $email = mysql_prep($_REQUEST['email'])){
		
		?>
		 <div class="error-p"> ایمیل وارد نشده است</div>
		 <br>
		    <a class="forgot" href="<?=_URL?>/forgot">برگشت</a>
		 <br>		
		<?

	} elseif(! @$password1 = mysql_prep(trim($_REQUEST['password1']))){
		?>
		<div class="error-p">پسورد جدید وارد نشده است.</div>
		<?
		}else if(! @$password2 = mysql_prep(trim($_REQUEST['password2']))){
			?>
			<div class="error-p">تکرار پسورد وارد نشده است</div>
			<?
		} else if ($password1==$password2) {
			$salt=time();
			$password = sha1($password1.$salt);
			$uniqidStr = md5(uniqid(mt_rand()));
			if(! $rs = dbq("UPDATE `users` SET `password`='{$password}',`forgot_pass_identity`='{$uniqidStr}',`salt`='{$salt}' WHERE `email`='{$email}' AND `forgot_pass_identity`='{$idcod}'")){
			echo "error on ".__FUNCTION__." at ".__LINE__;
			} else {
			# login
			$a="SELECT * FROM `users` WHERE `email`='{$email}' AND `password`='{$password}'";
			$b=mysql_query($a);
			$c=mysql_num_rows($b);
			if($c>0){	
			while ($s=mysql_fetch_assoc($b)) {
				$_SESSION["log-user"]= $s['id'];
				}
			}	
				echo "<script>location.href='./?page=user-panel';</script>";
			}
		}
}