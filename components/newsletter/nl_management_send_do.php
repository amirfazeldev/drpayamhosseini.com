<?

function nl_management_send_do(){

	if(! $subject = trim(@$_REQUEST['subject']) ){
		e( __FUNCTION__ , __LINE__ );
	} else if(! $text = trim(@$_REQUEST['text']) ){
		e( __FUNCTION__ , __LINE__ );		
	} else {

		if( @$_REQUEST['newsletter_email_list']=='1' ){
			if(! $rs = dbq(" SELECT * FROM `newsletter`WHERE `flag`=1
 ")){
			    echo "error on ".__FUNCTION__." at ".__LINE__;
			  } else{
			  	while( $rw = dbf($rs) ){
					if(! @$email = trim($rw['email']) ){
						continue;
					} else {
						$list_of_email_addresses[ $email ] = true;
					}
				}
			}
		}

		if( @$_REQUEST['users_email_list']=='1' ){
			
			if(! $rs = dbq(" SELECT * FROM `users` WHERE `email` LIKE '%@%' ")){
			    echo "error on ".__FUNCTION__." at ".__LINE__;
			  } else{
			  	while( $rw = dbf($rs) ){	
					if(! @$email = trim($rw['email']) ){
						continue;
					} else {
						$list_of_email_addresses[ $email ] = true;
					}
				}	
			}
		}

		if( $numb = $_REQUEST['numb'] ){
			$numb = str_replace( array('،',"
","\n","\r\n") , ",", $numb );
			$numb = explode(",", $numb);
			foreach ($numb as $k => $email) {
				if(! $email = trim($email) ){
					continue;
				} else {
					$list_of_email_addresses[ $email ] = true;
				}
			}
		}

		$from = "shomal tech ".setting_rw( "email" )['text'];
		$i=0;
		if( sizeof(@$list_of_email_addresses)){
			foreach ($list_of_email_addresses as $k => $r) {
				if(! strstr($k, '@')){
					continue;
				} else {
					xmail( $k , $subject , $text , $from );
					$i++;
				}
			}
			// var_dump($list_of_email_addresses);
			?>
			<div class="convbox">ارسال ایمیل به <?=$i?> آدرس با موفقیت انجام شد</div>
			<?
		}else{
			?>
			<div class="convbox">آدرس وارد نشده است</div>
			<?
		}

	}

}

