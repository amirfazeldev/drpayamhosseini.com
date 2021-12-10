<?
function admin_regester_form(){

	switch ($_REQUEST['do2']) {
		
		case 'saveNew':
			user_regester_saveNew();
			break;
		
		case 'saveEdit':
			admin_regester_saveEdit();
			break;
		
		}
	
	if(!admin_logged_in() ){
		return admin_login_form();
	} else if( ! $id = $_REQUEST['id']){
		;//
	} else if( ! $rs = dbq(" SELECT * FROM `user` WHERE `id`='$id' LIMIT 1 ")){
		echo "err - ".__LINE__." at ".__FUNCTION__;
	} else if( ! $rw = dbf($rs)){
		echo "err - ".__LINE__." at ".__FUNCTION__;		
	}else 

	
			?>
			<div class="do_admin">
				<form class="admin_login_form" method="post" action="./?page=regester<?='&do2='.
		( 
		$rw 
			? 'saveEdit&id='.$id 
			: 'saveNew' 
		)
		?>">
				<div style="font-size:20px;margin-bottom: 10px;font-family: iran">ثبت کاربر جدید</div>
				<input type="text" placeholder="نام" name="name" class="username" value="<?=$rw['name']?>" />
				<input type="text" placeholder="نام کاربری" name="username" class="username" value="<?=$rw['name']?>" />
				<input type="text" placeholder="پسورد" name="pass" class="username" value="<?=$rw['password']?>" />
				<input type="text" placeholder="تکرار پسورد" name="pass2" class="username" value="<?=$rw['']?>" />
				<input type="submit" value="ثبت" name="save" class="button blacke" />


				</form>
			</div>
			<?

	
}