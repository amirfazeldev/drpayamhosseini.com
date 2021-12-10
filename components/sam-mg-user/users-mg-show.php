<?
function users_mg_show()
{
	if( ! admin_logged_in() ){
		return admin_login_form();
	} else if( ! $id = @$_REQUEST['id']){
		;//
	} else if( ! $rs = dbq("SELECT * FROM `users` WHERE `id`='$id' ")){
		echo "err - ".__LINE__." at ".__FUNCTION__;
	} else if( ! $rw = dbf($rs)){
		echo "err - ".__LINE__." at ".__FUNCTION__;		
	}else 
?>
<div class="kadr">
	<?
		if ($rw["img"]) {
			$img=$rw["img"];
		}else{
			$img="img/no-avatar-big.png";
		}
	?>
		<div class="order_management_show">			
			<div class="hed" style="">
				<img  src="<?=_URL?>/<?= $img; ?>" />
			    <span><?php echo $rw["username"];?></span>
			</div>
			<div>
				<span>نام کاربر :&zwnj; </span>
				<div>
					
					<div class="currency_name"><?php echo $rw["name"];?></div>
				</div>
			</div>
			<div>
				<span>نام شرکت :&zwnj; </span>
				<div>
					
					<div class="currency_name"><?php echo $rw["company"];?></div>
				</div>
			</div>
			<div>
				<span>ایمیل  :&zwnj; </span>
				<div>
					
					<div class="currency_name"><?php echo $rw["email"];?></div>
				</div>
			</div>
			<div>
				<span>تلفن : </span>
				<div class="en"><?php echo $rw["tell"];?></div>
			</div>
			<div>
				<span>همراه : </span>
				<div class="en"><?php echo $rw["cell"];?></div>
			</div>
			<div>
				<span>کد ملی : </span>
				<div class="currency_name"><?php echo $rw["postal"];?></div>
			</div>
			<div>
				<span>آدرس : </span>
				<div class="currency_name"><?php echo nl2br($rw["address"]);?></div>
			</div>
			
			<div class="contact">
			<a class="btn btn-primary" href="./?page=user-panel&do=userprofile_form&id=<?=$rw["id"];?>">ویرایش جزئیات</a>
			</div>	
		</div>		
</div>	
<?
}