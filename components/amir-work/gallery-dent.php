<?php
function dentgallery()
{

?>
<div class="work-sample">

		<div class="title wow fadeInDown animated">
			<br>
			<h1>گالری قبل و بعد</h1>
			<i class="fa fa-th-large" aria-hidden="true"></i>
			<div class="title-line"></div>
		</div>


	<div class="work-sample-content dent-gallery">
<?php

	$a="SELECT * FROM `portfolio` WHERE `cat_id`=45 ORDER BY `id` DESC";
	$b=mysql_query($a);
	$c=mysql_num_rows($b);
	$ss=4;
	if($c>0)
	{
		while ($s=mysql_fetch_assoc($b)) {
			?>
			<img alt="<?=$s['name'];?>" src="<?=_URL?>/<?=$s['image'];?>">
<?php
$ss++;
		}
    

}
?>

	</div>

	<br>

</div>


<?php
}