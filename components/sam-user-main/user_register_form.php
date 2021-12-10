<?
function user_register_form(){
?>
		<div class="register-part">

			<div class="register-title">
				<div class="register-title-logo">
					<img src="./img/avatar.png">
				</div>
				<h1>ثبت نام در شمال تک</h1>
			</div>
			<!-- <div class="register-part-logo"><img src="./img/card.png"></div> -->
			<br>
<?
	switch (@$_REQUEST['do2']) {
		
		case 'saveNew':
			user_register_saveNew();
			break;
		
		}
?>
	
			<center><a href="./login" style="font-family: mj;color: blue;margin-top: 10px;display: inline-block;">اگر ثبت نام کردید وارد شوید</a></center>
			<form class="admin_login_form" method="post" action="./?page=register&do2=saveNew">
			
			<input type="text" class="register-input" placeholder="نام و نام خانوادگی*" name="name">
			<input type="text" class="register-input" placeholder="نام شرکت*" name="company">
			<input type="email" class="register-input" placeholder="ایمیل*" name="email">
			<input type="text" class="register-input" placeholder="آدرس*" name="address">
			<input type="number" class="register-input" placeholder="تلفن*" name="tell">
			<input type="number" class="register-input" placeholder="همراه*" name="cell">
			<input type="number" class="register-input" placeholder="کد پستی*" name="postal">
			<input type="text" class="register-input" placeholder="نام کاربری*" name="username">
			<input type="password" class="register-input" placeholder="کلمه عبور*" name="password">
			<input type="password" class="register-input" placeholder="تایید کلمه عبور*" name="password2">
			<br><br>
			<center><div class="g-recaptcha" data-sitekey="6LcqxkcUAAAAAERU2FZ0F5F-4BM7KIH0AMKF0PNm"></div></center>
			<center><input type="submit" class="register-submit btn btn-primary" value="ثبت نام" name="btn"></center>
		</form>
	</div>

<br><br>

<?
}