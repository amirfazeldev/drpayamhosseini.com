<?php
function slider()
{

?>
<script type="text/javascript" src="<?=_URL;?>/js/slider/slider.js"></script>
<div id="jssor_1" style="position:relative;margin:0 auto;left:0px;width:1300px;height:520px;overflow:hidden;visibility:hidden;">
       <div data-u="slides" style="cursor:default;position:relative;top:0px;left:0px;width:1300px;height:520px;overflow:hidden;">
<?php
  $query="SELECT * FROM `slider` WHERE `flag`='1' ORDER By `prio` ASC";
  $a=mysql_query($query);
  $i=1;
  while($b=mysql_fetch_assoc($a))
  {
    ?>
            <div>
              <a href="<?=$b["url"];?>">
                <img data-u="image" src="<?=_URL?>/<?=$b["location"];?>"  alt="<?=$b["name"];?>"/>
              </a>  
            </div>
<?php } ?>
        </div>

        <!-- Bullet Navigator -->
        <div data-u="navigator" class="jssorb051" style="position:absolute;bottom:35px;right:12px;" data-autocenter="1" data-scale="0.5" data-scale-bottom="0.75">
            <div data-u="prototype" class="i" style="width:16px;height:16px;">
                <svg viewbox="0 0 16000 16000" style="position:absolute;top:0;left:0;width:100%;height:100%;">
                    <circle class="b" cx="8000" cy="8000" r="5800"></circle>
                </svg>
            </div>
        </div>
        <!-- Arrow Navigator -->
        <div data-u="arrowleft" class="jssora051" style="width:55px;height:55px;top:0px;left:25px;" data-autocenter="2" data-scale="0.75" data-scale-left="0.75">
            <svg viewbox="0 0 16000 16000" style="position:absolute;top:0;left:0;width:100%;height:100%;">
                <polyline class="a" points="11040,1920 4960,8000 11040,14080 "></polyline>
            </svg>
        </div>
        <div data-u="arrowright" class="jssora051" style="width:55px;height:55px;top:0px;right:25px;" data-autocenter="2" data-scale="0.75" data-scale-right="0.75">
            <svg viewbox="0 0 16000 16000" style="position:absolute;top:0;left:0;width:100%;height:100%;">
                <polyline class="a" points="4960,1920 11040,8000 4960,14080 "></polyline>
            </svg>
        </div>
    </div>

<?php
}
    