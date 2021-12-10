<?
function linkify_management_list()
{
if( ! admin_logged_in() ){ 
    return admin_login_form();
  } else if(@$_REQUEST['delit']){
     if(! $rs = dbq(" SELECT * FROM `linkify` WHERE `id`='".$_REQUEST['delit']."'")){
      echo "error on ".__FUNCTION__." at ".__LINE__;      
     } else if(! $rs1 = dbq(" DELETE FROM `linkify` WHERE `id`='".$_REQUEST['delit']."'")){
      echo "error on ".__FUNCTION__." at ".__LINE__;
      }else{      
        $rw = dbf($rs);
        @unlink($rw["img"]);

        if(! $rs = dbq(" SELECT * FROM `linkify` WHERE `parent`='".$_REQUEST['delit']."'")){
          ?>
          <div class="ok-p">پیوند با موفقیت حذف شد.</div>
          <?      
         } else if(! $rs1 = dbq(" DELETE FROM `linkify` WHERE `parent`='".$_REQUEST['delit']."'")){
          echo "error on ".__FUNCTION__." at ".__LINE__;
          }else{ 
           while( $rw = dbf($rs) ){ 
            @unlink($rw["img"]);
          }
            ?>
            <div class="ok-p">پیوند با موفقیت حذف شد.</div>
            <?
          }  
      }  
  }else if(@$_REQUEST['flag']){
      toggl_flag("linkify");
  }else if(@$_REQUEST['movedown']){
      linkify_management_ordmove($_REQUEST['movedown'] , "+");
  }else if(@$_REQUEST['moveup']){
      linkify_management_ordmove($_REQUEST['moveup'] , "-");
  }

   if(! $rs = dbq(" SELECT * FROM `linkify`WHERE `cat`='".$_REQUEST['cat']."' AND `parent`='".$_REQUEST['parent']."' ")){
    echo "error on ".__FUNCTION__." at ".__LINE__;
  } else if( !$rw = dbf($rs)){
    ?>
    <div class="convbox">
        هنوز موردی ثبت نشده است
    </div>
    
    <?
  }else{
  ?>
  <div class="kadr">
    <table  style="" class="table">
    <tr bgcolor="#E76163">
      <?
       if(! $rs2 = dbq(" SELECT * FROM `linkify_config` WHERE `id`='".$_REQUEST['cat']."' ")){
        echo "error on ".__FUNCTION__." at ".__LINE__;
      } else if($rw2 = dbf($rs2)){
        if (@$rw2["haveIcon"]) {
        ?>
           <th>تصویر</th>
        <?}
      }?>     
         <th>عنوان پیوند</th>
         <!--<th>آدرس</th>-->
         <th>تعداد پیوند</th>
         <th></th>
                          
    </tr>
  
    <?
    if(! $rs = dbq(" SELECT * FROM `linkify`WHERE `cat`='".$_REQUEST['cat']."' AND `parent`='".$_REQUEST['parent']."' ORDER By `prio` ASC")){
    echo "error on ".__FUNCTION__." at ".__LINE__;
    }
    while( $rw = dbf($rs) ){
    
    echo "<tr>";
      if (@$rw2["haveIcon"]) {
       echo "<td style=\"width: 50px;padding: 0px\">";
       ?>
        <img class="log-edit-product" src="<?=_URL?>/<? echo$rw["img"];?>" />        
        <?
        echo "</td>";
    }    
    echo "<td>".$rw["name"]."</td>"; 
    // echo "<td>".$rw["url"]."</td>";    
    echo "<td class=\"center\">";
    if (!$i=dbr(dbq(" SELECT COUNT(*) FROM `linkify` WHERE `parent`='".$rw["id"]."' "),0,0)) {
      echo "0";
    }else{
    $rr=dbr(dbq(" SELECT COUNT(*) FROM `linkify` WHERE `parent`='".$rw["id"]."' "),0,0);
    echo $rr;
    }
    echo "</td>";

    echo "<td width=\"245px\" class=\"center\">";
    echo "<a class=\"edit\" title=\"نمایش پیوند ها\" href=./?page=admin&component=linkify&linkify=view&cat=".$_REQUEST['cat']."&parent=".$rw["id"]."><i class=\"fa fa-info-circle\"></i></a>";
    $flag=$rw['flag'];
    echo "<a class=\"remove\" title=\"حذف\" onclick='if(!confirm(\"آیا شما مطمئن هستید?\"))return false;' href=./?page=admin&component=linkify&linkify=view&cat=".$_REQUEST['cat']."&parent=".$_REQUEST['parent']."&delit=".$rw["id"]."><i class=\"fa fa-times\"></i></a>";
  
    echo "<a class=\"edit\" title=\"ویرایش\" href=./?page=admin&component=linkify&linkify=view&func=newlinkify&cat=".$_REQUEST['cat']."&parent=".$_REQUEST['parent']."&id=".$rw["id"]."><i class=\"fa fa-pencil-square-o\"></i></a>";
    $flag=$rw['flag'];
    echo "<a href=./?page=admin&component=linkify&linkify=view&func=listlinkify&cat=".$_REQUEST['cat']."&parent=".$_REQUEST['parent']."&flag=".$rw["id"]." ".( 
    @$flag
      ? 'title="غیرفعال کردن" class="active"'
      : 'title="فعال کردن" class="disabl"' 
    )."><i class=\"fa fa-check-square\"></i></a>";
    
    echo "<a class=\"move-up edit\"href=./?page=admin&component=linkify&linkify=view&func=listlinkify&cat=".$_REQUEST['cat']."&parent=".$_REQUEST['parent']."&moveup=".$rw["id"]." title=\"انتقال به بالا\"><i class=\"fa fa-chevron-up\"></i></a>";
    echo "<a class=\"move-down edit\"href=./?page=admin&component=linkify&linkify=view&func=listlinkify&cat=".$_REQUEST['cat']."&parent=".$_REQUEST['parent']."&movedown=".$rw["id"]." title=\"انتقال به پایین \"><i class=\"fa fa-chevron-down\"></i></a>";

    echo "</td></tr>";
    
  }
  
  ?>  
</table>
</div>
<?
}
}