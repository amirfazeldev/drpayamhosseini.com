<?php
function faq()
{
 ?>
 <div class="main faq-no">
     <div class="faq-no-title">سوالات متداول</div>
 <?php
  $a="SELECT * FROM `faq` WHERE `flag`=1";
  $b=mysql_query($a);
  $c=mysql_num_rows($b);
  $ss=3;
  if($c>0)
  {
      ?>
      
<div class="faq-content">
      <?php
      
    while ($s=mysql_fetch_assoc($b)) {
      ?>

<button class="accordion"><?=$s['question'];?></button>
<div class="panel">
  <p align="justify"><?=$s['awnser'];?></p>
</div>

<?php
$ss++;
    }
  ?>
  </div>
<script>
var acc = document.getElementsByClassName("accordion");
var i;

for (i = 0; i < acc.length; i++) {
  acc[i].addEventListener("click", function() {
    this.classList.toggle("active");
    var panel = this.nextElementSibling;
    if (panel.style.maxHeight){
      panel.style.maxHeight = null;
    } else {
      panel.style.maxHeight = panel.scrollHeight + "px";
    } 
  });
}
</script>
  <?php

}else{
?>

<div class="faq-no-error">موردی یافت نشد</div>
<?php
}
?>
</div>
<?php
}
