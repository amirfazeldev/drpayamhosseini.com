<?
function contact_management_form(){
	switch (@$_REQUEST['do']) {
		
		case 'email':
			contact_management_form_email();
			break;		
		}
	
	if( ! admin_logged_in() ){
		return admin_login_form();
	} else if( ! $id = @$_REQUEST['id']){
		;//
	} else if( ! $rs = dbq("SELECT * FROM `contact` WHERE `id`='$id' LIMIT 1 ")){
		echo "err - ".__LINE__." at ".__FUNCTION__;
	} else if( ! $rw = dbf($rs)){
		echo "err - ".__LINE__." at ".__FUNCTION__;		
	}else 
?>
	<div class="kadr">
		<div><span>نام: </span><?php echo $rw["name"];?></div>
		<div><span>موضوع: </span><?php echo $rw["sub"];?></div>
		<div><span>متن پیام: </span><?php echo $rw["text"];?></div>
		<div><span>تلفن: </span><?php echo $rw["tell"];?></div>
		<div><span>ایمیل: </span><?php echo $rw["email"];?></div>
	</div>
	<h3></h3>
	<div class="kadr">
		<form class="admin_form" method="post" action="./?page=admin&component=contact&contact=showcontact&do=email" enctype="multipart/form-data">				
			<input type="text" placeholder="موضوع" name="subject" class="username" value="بازگشت به: <?=@mysql_prep($rw['sub'])?> " /><br>
			<textarea placeholder="متن پیام" name="message"></textarea>
			<br>
            <input type="hidden" value="<?php echo $rw["email"];?>" name="to">
            <input type="hidden" value="<?php echo $rw["id"];?>" name="id">
			<input type="submit" value="ارسال" name="save" class="btn btn-primary" />
		</form>
	</div>
</div>	
	<?

	
}
