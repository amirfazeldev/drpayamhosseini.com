<? 
function linkify_cat_management_list()
{
if( ! admin_logged_in() ){ 
    return admin_login_form();
  } else if(@$_REQUEST['delit']){
     if(! $rs = dbq(" SELECT * FROM `linkify_config` WHERE `id`='".$_REQUEST['delit']."'")){
      echo "error on ".__FUNCTION__." at ".__LINE__;      
     } else if(! $rs1 = dbq(" DELETE FROM `linkify_config` WHERE `id`='".$_REQUEST['delit']."' AND `pinned`= 0 ")){
      echo "error on ".__FUNCTION__." at ".__LINE__;
      }else{      
        $rw = dbf($rs);
        @unlink($rw["location"]);
        if(! $rs = dbq(" SELECT * FROM `linkify` WHERE `cat`='".$_REQUEST['delit']."'")){
          ?>
          <div class="ok-p">پیوند با موفقیت حذف شد.</div>
          <?      
         } else if(! $rs1 = dbq(" DELETE FROM `linkify` WHERE `cat`='".$_REQUEST['delit']."'")){
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
      toggl_flag("linkify_config");
      toggl_flag_all("linkify",$_REQUEST['flag']);
  }

   if(! $rs = dbq(" SELECT * FROM `linkify_config` ")){
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
    
             <th>عنوان جعبه پیوند</th>
             <th>تعداد پیوند</th>
             <th></th>
                          
    </tr>
  
    <?
    if(! $rs = dbq(" SELECT * FROM `linkify_config` ")){
    echo "error on ".__FUNCTION__." at ".__LINE__;
    }
    while( $rw = dbf($rs) ){
    
    echo "<tr>";
    
    echo "<td>".$rw["name"]."</td>";    
    echo "<td class=\"center\">";
    if (!$i=dbr(dbq(" SELECT COUNT(*) FROM `linkify` WHERE `cat`='".$rw["id"]."'"),0,0)) {
      echo "0";
    }else{
    $rr=dbr(dbq(" SELECT COUNT(*) FROM `linkify` WHERE `cat`='".$rw["id"]."' "),0,0);
    echo $rr;
    }
    echo "</td>";

    echo "<td width=\"145px\" class=\"center\">";
    if (@$rw["haveSub"]) {
    echo "<a class=\"edit\" title=\"نمایش پیوند ها\" href=./?page=admin&component=linkify&linkify=view&cat=".$rw["id"]."&parent=0><i class=\"fa fa-info-circle\"></i></a>";
    }
    $flag=$rw['flag'];
    echo "<a class=\"remove\" title=\"حذف\" onclick='if(!confirm(\"آیا شما مطمئن هستید?\"))return false;' href=./?page=admin&component=linkify&linkify=listlinkify&delit=".$rw["id"]."><i class=\"fa fa-times\"></i></a>";
  
    echo "<a class=\"edit\" title=\"ویرایش\" href=./?page=admin&component=linkify&linkify=newlinkifycat&id=".$rw["id"]."><i class=\"fa fa-pencil-square-o\"></i></a>";
    $flag=$rw['flag'];
    echo "<a href=./?page=admin&component=linkify&linkify=listlinkify&flag=".$rw["id"]." ".( 
    @$flag
      ? 'title="غیرفعال کردن" class="active"'
      : 'title="فعال کردن" class="disabl"' 
    )."><i class=\"fa fa-check-square\"></i></a></td>";
    echo "</tr>";
    
  }
  
  ?>  
  
</table>
</div>
<?
}

}