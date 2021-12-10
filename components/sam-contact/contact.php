<?php
function contact()
{
	?>

<div class="contact">
    <h1>با روش های زیر با ما تماس بگیرید</h1>
    <div class="contact-box wow fadeInDown animated animated">
    	<img src="<?=_URL;?>/img/contact/email.png">
    	<h3>ایمیل</h3>
    	<h4><?= setting_rw( "email" )['text'];?></h4>
    </div>

    <div class="contact-box wow fadeInDown animated animated">
    	<img src="<?=_URL;?>/img/contact/place.png">
    	<h3>آدرس</h3>
    	<h4><?= setting_rw( "addres" )['text'];?></h4>
    </div>

    <div class="contact-box wow fadeInDown animated animated">
    	<img src="<?=_URL;?>/img/contact/telephone.png">
    	<h3>تلفن</h3>
    	<h4><?= setting_rw( "tell" )['text'];?></h4>
    </div>
</div>

<div class="contact-form wow fadeInDown animated animated">
    <?
        switch (@$_REQUEST['do']) {
            
            case 'send':
                contact_new();
                break;      
            }
        // $text="@$_REQUEST['text']";    
        ?>
	<form method="post" action="./?page=contact&do=send">
		<input type="text" name="name" class="contact-form-input" placeholder="نام و نام خانوادگی" value="<?=@mysql_prep($_REQUEST['name'])?>">
		<input type="text" name="tell" class="contact-form-input" placeholder="شماره تماس" value="<?=@$_REQUEST['tell']?>">
		<input type="text" name="email" class="contact-form-input" placeholder="ایمیل" value="<?=@mysql_prep($_REQUEST['email'])?>">
		<input type="text" name="sub" class="contact-form-input" placeholder="موضوع" value="<?=@mysql_prep($_REQUEST['sub'])?>">
		<?= @mysql_prep($_REQUEST['text']) ?'<textarea class="contact-form-textarea wow fadeInUp animated" placeholder="متن پیام ..." name="text">'. @mysql_prep($_REQUEST['text']).'</textarea>' : '<textarea class="contact-form-textarea wow fadeInUp animated" placeholder="متن پیام ..." name="text"></textarea>' ?>
        <div class="g-recaptcha wow fadeInUp animated" data-sitekey="6LcqxkcUAAAAAERU2FZ0F5F-4BM7KIH0AMKF0PNm"></div>
		<input type="submit" name="contact-btn" value="ارسال پیام" class="contact-form-btn">
	</form>
</div>

<?
}