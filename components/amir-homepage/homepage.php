<?php
function homepage()
{
	?>


<div class="desc">
    <div class="main2">
        <div class="desc-box">
            <i class="fas fa-map-marker-alt"></i>
            <span>آدرس :</span>
            <br>
            <span><?= setting_rw( "addres" )['text'];?></span>
        </div>

        <div class="desc-box">
            <i class="fas fa-phone-volume"></i>
            <span>تلفن :</span>
            <br>
            <span><?= setting_rw( "tell" )['text'];?></span>
        </div>

        <div class="desc-box">
            <i class="fas fa-envelope-open-text"></i>
            <span>ایمیل :</span>
            <br>
            <span><?= setting_rw( "email" )['text'];?></span>
        </div>

        <div class="desc-box">
            <i class="fas  fa-clock"></i>
            <span>ساعت کاری :</span>
            <br>
            <span><?= setting_rw( "time_work" )['text'];?></span>
        </div>
    </div>
</div>

<?
}
