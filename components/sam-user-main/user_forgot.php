<?
function user_forgot()
{
?>	

<?
	switch ($_REQUEST['do']) {

		case 'verify':
			return user_forgot_verify();
			break;
		case 'new':
			return user_forgot_new();
			break;	
		case 'save':
			return user_forgot_save();
			break;
		case 'chang':
				return user_forgot_changepassword_saveEdit();
				break;	
	}
	 
?>
<div class="content">
		<div class="register-part">
			<div class="register-part-logo"><img src="./img/card.png"></div>
			<br>
<div class="forgot-head">
    <h1 class="head">فراموشی کلمه عبور!</h1>
	<div class="text">لطفا بمنظور تنظیم مجدد کلمه عبور، آدرس ایمیل خود را وارد نمایید.</div>
    </div>
	
		<form class="" method="post" action="./forgot">
			<input type="hidden" name="do" value="verify">
			<input type="email" class="register-input" placeholder="ایمیل" name="email">
			<br>
			<input type="submit" class="register-submit btn btn-primary" value="ارسال" name="btn">
		</form>
	</div>
</div>

<br><br>

<?
}