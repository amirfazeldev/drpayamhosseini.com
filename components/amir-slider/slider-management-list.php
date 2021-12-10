<? 
function slider_management_list()
{
if( ! admin_logged_in() ){ 
    return admin_login_form();
  } else if(@$_REQUEST['delit']){
     if(! $rs = dbq(" SELECT * FROM `slider` WHERE `id`='".$_REQUEST['delit']."'")){
      echo "error on ".__FUNCTION__." at ".__LINE__;      
     } else if(! $rs1 = dbq(" DELETE FROM `slider` WHERE `id`='".$_REQUEST['delit']."'")){
      echo "error on ".__FUNCTION__." at ".__LINE__;
      }else{      
        $rw = dbf($rs);
        @unlink($rw["location"]);
        ?>
        <div class="ok-p">اسلایدر با موفقیت حذف شد.</div>
        <?
      }  
  }else if(@$_REQUEST['flag']){
      toggl_flag("slider");
  }else if(@$_REQUEST['movedown']){
      slider_management_ordmove($_REQUEST['movedown'] , "+");
  }else if(@$_REQUEST['moveup']){
      slider_management_ordmove($_REQUEST['moveup'] , "-");
  }

###################################################################################
# 
# the list
  $tdd = 10;
  $stt = $tdd * intval(@$_REQUEST['p']); 
  $query1 = "SELECT * FROM `slider` ORDER By `prio` ASC LIMIT $stt , $tdd";
    if(! $rs = dbq($query1)){

    echo "error on ".__FUNCTION__." at ".__LINE__;

  } else if( mysql_num_rows($rs)<1){

    ?>

    <div class="convbox">هنوز موردی ثبت نشده است </div>  

    <?

  }else{//else1  
 ?>   
  <div class="kadr">
    <table  style="" class="table">
    <tr bgcolor="#E76163">    
       <th>عکس</th>
       <th>نام</th>
       <!-- <th>آدرس</th>                           -->
    </tr>
  
    <?

    while( $rw = dbf($rs) ){
    
    echo "<tr>";
    
    echo "<td style=\"width: 50px;padding: 0px\">";
    ?><img class="log-edit-product" src="<?=_URL?>/<? echo$rw["location"];?>" /><?
    echo "</td>";   
    echo "<td>".$rw["name"]."</td>";
    // echo "<td>".$rw["url"]."</td>";
   
    echo "<td width=\"245px\" class=\"center\">";
    echo "<a class=\"remove\" title=\"حذف\" onclick='if(!confirm(\"آیا شما مطمئن هستید?\"))return false;' href=./?page=admin&component=slider_management&slider=listslider&delit=".$rw["id"]."><i class=\"fa fa-times\"></i></a>";
  
    echo "<a class=\"edit\" title=\"ویرایش\" href=./?page=admin&component=slider_management&slider=newslider&id=".$rw["id"]."><i class=\"fa fa-pencil-square-o\"></i></a>";
    $flag=$rw['flag'];
    echo "<a href=./?page=admin&component=slider_management&slider=listslider&flag=".$rw["id"]." ".( 
    @$flag
      ? 'title="غیرفعال کردن" class="active"'
      : 'title="فعال کردن" class="disabl"' 
    )."><i class=\"fa fa-check-square\"></i></a>";
    echo "<a class=\"move-up edit\"href=./?page=admin&component=slider_management&slider=listslider&moveup=".$rw["id"]." title=\"انتقال به بالا\"><i class=\"fa fa-chevron-up\"></i></a>";
    echo "<a class=\"move-down edit\"href=./?page=admin&component=slider_management&slider=listslider&movedown=".$rw["id"]." title=\"انتقال به پایین \"><i class=\"fa fa-chevron-down\"></i></a></td>";
    echo "</tr>";
    
  }
  $link="/?page=admin&component=slider_management&slider=listslider";
  ?>  
  
</table>
<?=listmaker_paging($query1, $link, $tdd, $debug=false);?>
</div>
<?
}//else1
}

