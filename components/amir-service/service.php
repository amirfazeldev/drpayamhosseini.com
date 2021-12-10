<?php
	function service()
  {
 
    ?>
<div class="service">
  <div class="main2">
    <h2>خدمات ما</h2>
    <br><br>
<?php
  $query="SELECT * FROM `linkify` WHERE `parent`=0 AND `cat`=12 AND `flag`=1 ORDER By `prio` ASC";
  $a=mysql_query($query);
  $i=1;
  while($b=mysql_fetch_assoc($a))
  {
    $id=$b["id"];
?>
    <div class="service-box">
      <img src="<?=_URL?>/<?=$b["img"];?>">
      <h3><?=$b["name"];?></h3>
    </div>
    <?php
}
    ?>

  </div>
</div>

<div class="dentalbg"></div>
   
    	
<?php
 }