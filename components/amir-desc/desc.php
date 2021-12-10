<?php
	function desc()
  {
 
    ?>

<div class="welcom">
  <div class="main2">
    
	<?php
		$a="SELECT * FROM `description` WHERE `id`='1'";
		$b=mysql_query($a);
		$c=mysql_num_rows($b);
		if($c>0)
		{
		while ($s=mysql_fetch_assoc($b)) {
				?>
			<div class="welcom-left">
     			<img src="<?=_URL."/".$s['img'];;?>">
    		</div>

		    <div class="welcom-right">
		      <h2><?=$s['title'];?></h2>
		      <p align="justify"><?=$s['description'];?></p>
		    </div>
        <?php
         }
        }
        ?>

  </div>  
</div>


<div class="consult">
  <div class="main2">
    <h2>مشاوره کاملا رایگان میخوای ؟ کلیک کن</h2>
    <a href="#">درخواست مشاوره رایگان</a>
  </div>
</div>

    	
<?php
 }