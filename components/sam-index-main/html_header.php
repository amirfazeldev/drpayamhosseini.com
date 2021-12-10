<?
function html_header(){
?>
<!DOCTYPE html>
<html lang="fa">
<head>
	<meta charset="utf-8">
	<title><?= setting_rw( "main_title" )['text'];?></title>
	<meta name="keywords" content="<?=setting_rw('keywords')['text'];?>">
	<meta name="description" content="<?=setting_rw('description')['text'];?>">	
	<meta name="samandehi" content="816860137"/>
	<link rel="icon" href="<?=_URL;?>/<?=setting_rw('fav')['text'];?>" type="image/gif" sizes="16x16">
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
	<link rel="stylesheet" type="text/css" href="<?=_URL;?>/style/font.css">
	<link rel="stylesheet" type="text/css" href="<?=_URL;?>/style/style.css">
	<link rel="stylesheet" type="text/css" href="<?=_URL;?>/style/responsive.css">
	<link href="<?=_URL;?>/style/font-awesome.min.css" rel="stylesheet" type="text/css" />
	<link href="<?=_URL;?>/style/font-awesome.css" rel="stylesheet" type="text/css"/>
	<!-- css -->
	<?//include_all_css_index();?>
	<link href="<?=_URL?>/styles.css" rel="stylesheet" type="text/css" />
	<!-- js -->
	<script type="text/javascript" src="<?=_URL;?>/js/jquery-1.11.3.min.js"></script>
	<script type="text/javascript" src="<?=_URL;?>/js/landerscripts.js"></script>
	<script type="text/javascript" src="<?=_URL;?>/js/bar.js"></script>
	<script type="text/javascript" src="<?=_URL;?>/js/slider/jssor.slider-25.2.0.min.js"></script>	
	<script src='https://www.google.com/recaptcha/api.js'></script>
	<!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-104178291-3"></script>
<script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'UA-104178291-3');
</script>
	<?//include_all_js_echotags();?>
	<script src="<?=_URL?>/scripts.js"></script>
	<?=setting_rw('html_extra_tags')['text'];?>		
</head>
<body>

<div class="header">

	<div class="header-nav">
		<a href="<?=_URL;?>/home" title="<?= setting_rw( "main_title" )['text'];?>"><img src="<?=_URL;?>/<?=setting_rw('logo')['text'];?>" alt="<?= setting_rw( "main_title" )['text'];?>" class="logo"></a>
		<div class="nav" style="float: left;">
<?php
  $query="SELECT * FROM `linkify` WHERE `parent`=0 AND `cat`=6 AND `flag`=1 ORDER By `prio` ASC";
  $a=mysql_query($query);
  $i=1;
  while($b=mysql_fetch_assoc($a))
  {
  	$id=$b["id"];
?>

<div class="drop-down">
	<a href="<?=$b["url"];?>" class="nav-a">
		<span><?=$b["name"];?></span>
	</a>	 
<?php
  $query2="SELECT * FROM `linkify` WHERE `parent`= $id AND `flag`=1";
  $a2=mysql_query($query2);
  $i2=1;
  if (mysql_num_rows($a2)) {
  		?>
  		<div class="drop-down-content">
  		<?php	
  	
	   while($b2=mysql_fetch_assoc($a2))
	  {
		    ?>
				<a href="<?=$b2["url"];?>" class="drop-down-content-a">
					<i class="fa fa-caret-left" aria-hidden="true"></i> 
					<span><?=$b2["name"];?></span>
				</a>
			<?php
	  }
		 ?>
		</div>
	
		 <?php
	}
	 	 ?>
</div>
<?php	
}
if ( @$_SESSION['log-adm'] ) {
?>	
	<a href="<?=_URL;?>/admin" class="nav-register-btn">مدیریت</a>
<?	
}else{
?>
			<!-- <a href="<?=_URL;?>/contact" class="nav-register-btn">پشتیبانی</a> -->
<?}?>		

		</div>

		<div class="bar"><i class="fa fa-bars" aria-hidden="true"></i></div>

		<!-- end nav -->

	</div>
	
</div>

	<?
}