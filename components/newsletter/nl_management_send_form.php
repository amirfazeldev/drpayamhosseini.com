<?
function nl_management_send_form(){

	switch (@$_REQUEST['do']) {
		
		case 'send':
			return nl_management_send_do();

	}

	?>
	<form method="post" action="./?page=admin&component=nl_management&fanc=newnl&do=send" class="<?=__FUNCTION__?>">
		
		<div class="te-div">
			<div>عنوان خبرنامه</div>
			<input type="text" name="subject" id="<?=__FUNCTION__?>_subject"/>
		</div>
		
		<div class="te-div">
			<div>متن خبرنامه</div>
			<textarea name="text" id="<?=__FUNCTION__?>_text"></textarea>
		</div>
	
		<label>
			<input type="checkbox" value="1" name="newsletter_email_list" id="newsletter_email_list" checked />
			<span>ارسال به ایمیل های ثبت شده در بخش خبرنامه 
				<span style="color:green;">( <?=table2('newsletter' , 'count(*)', "`flag` =1")?> آدرس ایمیل )</span>
			</span>
		</label>

		<label>
			<input type="checkbox" value="1" name="users_email_list" id="users_email_list" />
			<span>ارسال به ایمیل های کاربران
				<span style="color:green;">( <?=table2( 'users' , 'count(*)' , "`email` LIKE '%@%' ")?> آدرس ایمیل )</span>
			</span>
		</label>

		<label>
			<input type="checkbox" value="1" id="nlmg_list_of_emails_checkbox" />
			<span>ارسال به ایمیل های دلخواه</span>
		</label>

		<div class="te-div" id="nlmg_list_of_emails">
			<div>آدرس های ایمیل (با کاما ، ویرگول و یا خط به خط جدا کنید)</div>
			<textarea name="numb"></textarea>
		</div>

		<div class="divider"></div>
		
		<div>
			<input type="submit" value="ارسال" class="btn btn-primary" />
		</div>

	</form>
	<?
}









