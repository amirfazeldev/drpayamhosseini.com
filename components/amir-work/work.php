<?php
function work_sample()
{

?>
<div class="work-sample">

		<div class="title wow fadeInDown animated">
			<br>
			<h1>نمونه کارها</h1>
			<i class="fa fa-th-large" aria-hidden="true"></i>
			<div class="title-line"></div>
		</div>


	<div class="work-sample-content">
<?php

	$a="SELECT * FROM `portfolio` WHERE `flag`=1 ORDER BY `id` DESC LIMIT 6";
	$b=mysql_query($a);
	$c=mysql_num_rows($b);
	$ss=4;
	if($c>0)
	{
		while ($s=mysql_fetch_assoc($b)) {
			?>
			<a <?if($s['cat_id']=='5'){}else{echo'href="'. $s['url'].'"';}?> target="a_blank" class="aaa">
		<div class="work-sample-part wow fadeInUp animated" data-wow-delay="0.<?=$ss;?>s">
			<div class="work-sample-part-img">
			<img alt="<?=$s['name'];?>" src="<?=_URL?>/<?=$s['image'];?>">
			</div>
			<span><?=$s['name'];?></span>
		</div>
		</a>
<?php
$ss++;
		}
    

}
?>
		<br>

		<a href="./all-work-sample" class="work-sample-content-a wow fadeInUp animated">مشاهده تمامی نمونه کارها</a>

	</div>

	<br>

</div>
<?php
}

    