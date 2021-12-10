<?
function html_header_admin(){
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">	
<?php
	$rw=setting_rw( "main_title" );
?>
	<title><?= setting_rw( "main_title" )['text'];?></title>
	<meta name="keywords" content="<?=setting_rw('keywords')['text'];?>">
	<meta name="description" content="<?=setting_rw('description')['text'];?>">	
	<link rel="icon" href="<?=_URL;?>/<?=setting_rw('fav')['text'];?>" type="image/gif" sizes="16x16">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="<?=_URL;?>/style/font.css">
	<link href="<?=_URL;?>/style/font-awesome.min.css" rel="stylesheet" type="text/css" />
	<link href="<?=_URL;?>/style/font-awesome.css" rel="stylesheet" type="text/css"/>
	<!-- css -->
	<?//include_all_css_admin();?>
	<?//include_all_css_duo();?>
	<link href="<?=_URL?>/styles-admin.css" rel="stylesheet" type="text/css" />
	<!-- js -->
	<script type="text/javascript" src="<?=_URL;?>/js/jquery-1.11.3.min.js"></script>
	<script type="text/javascript" src="<?=_URL;?>/js/landerscripts.js"></script>
	<script type="text/javascript" src="<?=_URL;?>/js/bar.js"></script>
	<script type="text/javascript" src="<?=_URL;?>/data/ckeditor/ckeditor.js"></script>
	<script type="text/javascript" src="<?=_URL;?>/data/tinymce/tinymce.min.js"></script>
	<script type="text/javascript" src="<?=_URL;?>/data/tinymce/tinymce-set.js"></script>
	<script src='https://www.google.com/recaptcha/api.js'></script>
	<?include_all_js_echotags_admin();?>
	<?include_all_js_echotags_duo();?>
	<!-- <script src="<?=_URL?>/scripts-admin.js"></script> -->
</head>
<body>
<?php if(admin_logged_in() ){?>	
<div class="header">
    <div style="width: 90%;margin: auto;">
 	<img src="<?=_URL;?>/<?=setting_rw('logo')['text'];?>" class="logo" alt="<?= setting_rw( "main_title" )['text'];?>">
		<div style="float: right;direction: rtl;">
			<a href="admin" class="header-btn">
				داشبورد
			</a>

			<a href="setting" class="header-btn">
				تنظیمات وبسایت
			</a>

			<a href="home" class="header-btn" target="a_blank">
				ورود به سایت
			</a>
			<a href="changepassword" class="header-btn">
				تغییر پسورد
			</a>
			<a href="logout" class="header-btn">
				خروج
			</a>
		</div>
	</div>
</div>	
<?	
}
}