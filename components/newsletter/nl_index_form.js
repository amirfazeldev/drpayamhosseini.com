$(document).ready(function(){

	$('#newssave').on('click',function(){

	newsmail=$('#newsmail').val();

	var filter = /^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;

	if(newsmail=="") 

	{

	// alert('لطفا ایمیل خود را وارد کنید');

	$('#loader').html('<p class="error_news">لطفا ایمیل خود را وارد کنید</p>');

	$('#newsmail').addClass('warn');

	$('#newsmail').focus;

	return;

	}else if (!filter.test(newsmail)) {

	$('#loader').html('<p class="error_news">ایمیل صحیح نمی باشد</p>');

	$('#newsmail').addClass('warn');

	$('#newsmail').focus;

	return false;

	}else{

	call_ajax(newsmail);

	}
	});
});

function call_ajax(newsmail)

{ 

 $('#loader').text('لطفا صبر کنید ...').fadeIn(5000).delay(50000);
 $.ajax({

	 url:'http://shomaltech.ir/?do_action=nl_index_ajax',

	 data:{newsmail:newsmail},

	 type:'post',

	 success:function(data){

	 $('#loader').html(data);

	 // $('#loader').fadeOut(5000).delay(50000);

	 },

	 error: function(err) {

        $('#loader').text('Error: ' + err.status + ' ' + err.statusText);

        // $('#loader').fadeOut(5000).delay(50000);

     }   

 });

}