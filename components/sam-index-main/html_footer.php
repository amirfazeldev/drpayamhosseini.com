<?

function html_footer(){
	?>


<div class="footer">
	    <?php
  $query="SELECT * FROM `linkify` WHERE `parent`=0 AND `cat`=9 AND `flag`=1 ORDER By `prio` ASC";
  $a=mysql_query($query);
  $i=1;
  while($b=mysql_fetch_assoc($a))
  {
  	$id=$b["id"];
?>
	<div class="footer-box">
		<div class="footer-box-title wow fadeInDown animated">
			<span><?=$b["name"];?></span>
		</div>
		<div class="wow fadeInRight animated" data-wow-delay="0.1s" style="visibility: visible; animation-delay: 0.1s;">
			<?php
  $query2="SELECT * FROM `linkify` WHERE `parent`= $id AND `flag`=1";
  $a2=mysql_query($query2);
  $i2=1;
  if (mysql_num_rows($a2)) {
  	
	   while($b2=mysql_fetch_assoc($a2))
	  {
		    ?>
			<a href="<?=$b2["url"];?>" class="footer-box-a"><?=$b2["name"];?></a>
			<?php
	  }
	}
	 	 ?>
		</div>
	</div>
 <?php
  }
  ?>

	<div class="copy-right">
		<h4><?= setting_rw( "html_footer_copyright" )['text'];?></h4>
	</div>
</div>
		
<script type="text/javascript" src="<?=_URL;?>/js/jquery.min.js"></script>
<?//include_all_jsfooter_echotags();?>
<script src="<?=_URL?>/scripts-footer.js"></script>
</body>
</html>
<?
}
		