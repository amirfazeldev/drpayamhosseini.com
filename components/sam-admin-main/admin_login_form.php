<?
function admin_login_form(){
	// action

	switch (@$_REQUEST['do']) {

		case 'login':

		 if( admin_login_do() ){

				return true;

			} else {

				;//

			}

			break;

	}
	// form
?>
<div class="login-box">

	<div class="login-box-title"><span>مدیریت سایت</span></div>
	<br>
	<form style="margin-top: 1px;" method="post" action="./?page=admin&do=login">
		<div class="container-login">
			<input type="text" placeholder="username" name="username" class="login-box-username">
			<input type="password" placeholder="password" name="password" class="login-box-password">
			<input type="password" placeholder="code" name="code" class="login-box-code">
			<div class="admin-captcha">
				<div class="g-recaptcha" data-sitekey="6LcqxkcUAAAAAERU2FZ0F5F-4BM7KIH0AMKF0PNm"></div>
			</div>
<br>
			<input type="submit" value="login" name="login-btn" class="login-box-btn">
		</div>
	</form>
</div>
<a href="./" class="admin_login_form_back">
		<i class="fa fa-reply"></i>
		بازگشت به سایت
</a>
<div class="admin_login_form_copyraid">
	<hr>
	<span align="left" class="tx1">© <a target="_blank" href="http://shomaltech.ir">shomaltech</a> <?php echo date("Y") ?></span>
</div>	
<?
}
// admin_login_form tu css ezafe beshe.