<?
function user_forgot_new()
{
?>
<div class="content">
		<div class="register-part">
			<div class="register-part-logo"><img src="<?=_URL?>/img/card.png"></div>
			<br>
<div class="forgot-head">
    <h1 class="head">بازیابی کلمه عبور!</h1>
	<div class="text">لطفا بمنظور تنظیم مجدد کلمه عبور، کد ارسال شده به ایمیل خود را وارد کنید.</div>
    </div>
	
		<form class="" method="post" action="<?=_URL?>/forgot">
			<input type="hidden" name="do" value="save">
			<input type="hidden" name="email" value="<?=$_REQUEST['mail']?>">
			<input type="text" class="register-input" placeholder="کد" name="idcod" value="<?=$_REQUEST['pas']?>">
			<br>
			<input type="submit" class="register-submit btn btn-primary" value="ارسال" name="btn">
		</form>
	</div>
</div>

<br><br>

<?
}