<?
function changepassword_saveEdit()
{
    if (@$_SESSION['log-adm']) {
	  	$id=$_SESSION['log-adm'];
	  }	
  	if(! @$oldpassword = mysql_prep(trim($_REQUEST['oldpassword']))){
		?>
		<div class="error-p">پسورد قبلی وارد نشده است.</div>
		<?
	}else{
		$a="SELECT * FROM `users` WHERE `id`='".$id."' AND `flag`=1 AND `status`=1";
		$result=mysql_query($a);
		$row=mysql_fetch_array($result);
		$storedpassword=$row['password'];
		$salt=$row['salt'];
		$oldhashpassword=sha1($oldpassword.$salt);
		$c=mysql_num_rows($result);
		if($c<=0){
			echo "error on ".__FUNCTION__." at ".__LINE__;
		}else if ($storedpassword != $oldhashpassword ) {
			?>
			<div class="error-p">پسورد قبلی صحیح وارد نشده است.</div>
			<?
		}else if(! @$password1 = mysql_prep(trim($_REQUEST['password1']))){
		?>
		<div class="error-p">پسورد جدید وارد نشده است.</div>
		<?
		}else if(! @$password2 = mysql_prep(trim($_REQUEST['password2']))){
			?>
			<div class="error-p">تکرار پسورد وارد نشده است</div>
			<?
		} else if ($password1==$password2) {
			$passworderror=array();
			if (strlen($password1)<8) {
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
				$salt=time();
				$password = sha1($password1.$salt);
				if(! $rs = dbq("UPDATE `users` SET `password`='{$password}',`salt`='{$salt}' WHERE `id`='{$id}'")){
				echo "error on ".__FUNCTION__." at ".__LINE__;
				} else {
				?>
				<div class="ok-p">تغییرات با موفقیت ثبت شد.</div>
				<?	

				}
			}	
		}else{
			?>
			<div class="error-p">تکرار پسورد صحیح نمی باشد</div>
			<?
		}	
	}		

}