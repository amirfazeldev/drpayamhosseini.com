<?php
	function about()
  {
 
    ?>
    	<div class="tarefe">
  <div class="tarefe-box">
   
    		<?php
    			$a="SELECT * FROM `about` WHERE `id`='1'";
    			$b=mysql_query($a);
    			$c=mysql_num_rows($b);
    			if($c>0)
    			{
    			while ($s=mysql_fetch_assoc($b)) {
    					?>
    <h1>دکتر سید پیام حسینی</h1>
    <h3><?=$s['description'];?></h3>
    <?php
                 }
                }
                ?>
  </div>
</div>
    	
<?php
 }