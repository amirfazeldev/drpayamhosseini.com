<?
function user_login_form(){
?>
<div class="content">
	<div class="register-part">
		<!-- <div class="register-part-logo"><img src="<?=_URL?>/img/card.png"></div> -->
		<div class="register-title">
				<div class="register-title-logo">
					<img src="./img/avatar.png">
				</div>
				<h1>ورود به حساب کاربری</h1>
			</div>
<?
	// action
	switch (@$_REQUEST['do']) {
		case 'login':
		 if( user_login_do() ){
				return true;
			} else {
				;//
			}
			break;
	}

	// form
	?>
	<form style="margin-top: 15px;text-align: center;" method="post" action="./?page=login&do=login">
		<input type="text" class="login-input" placeholder="نام کاربری" name="username">
			<br>
			<input type="password" class="login-input" placeholder="کلمه عبور" name="password">
			<br><br>
			<center><div class="g-recaptcha" data-sitekey="6LcqxkcUAAAAAERU2FZ0F5F-4BM7KIH0AMKF0PNm"></div></center>
			<input type="submit" class="register-submit btn btn-primary" value="ورود" name="btn">
			<br><br>
			<a class="forgot" href="<?=_URL?>/forgot">کلمه عبورام را فراموش کرده ام</a>
		</form>
	</div>
</div>

<br><br>

<?
}

// admin_login_form tu css ezafe beshe.
