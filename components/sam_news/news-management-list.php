<? 
function news_management_list()
{
if( ! admin_logged_in() ){ 
    return admin_login_form();
  } else if(@$_REQUEST['delit']){
     if(! $rs = dbq(" SELECT * FROM `news` WHERE `id`='".$_REQUEST['delit']."'")){
      echo "error on ".__FUNCTION__." at ".__LINE__;      
     } else if(! $rs1 = dbq(" DELETE FROM `news` WHERE `id`='".$_REQUEST['delit']."'")){
      echo "error on ".__FUNCTION__." at ".__LINE__;
      }else{      
        $rw = dbf($rs);
        @unlink($rw["location"]);
        ?>
        <div class="ok-p">اسلایدر با موفقیت حذف شد.</div>
        <?
      }  
  }else if(@$_REQUEST['flag']){
      toggl_flag("news");
  }

   if(! $rs = dbq(" SELECT * FROM `news` ")){
    echo "error on ".__FUNCTION__." at ".__LINE__;
  } else

###################################################################################
# 
# the list
  $tdd = 10;
  $stt = $tdd * intval(@$_REQUEST['p']); 
  $query1 = "SELECT * FROM `news` ORDER BY `id` DESC LIMIT $stt , $tdd";
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
             <th>عنوان</th>
             <th>دسته</th>
             <th>متن</th>
                          
    </tr>
  
    <?

    while( $rw = dbf($rs) ){
    
    echo "<tr>";
    
    echo "<td style=\"width: 50px;padding: 0px\">";
    ?>
    
            <img class="log-edit-product" src="<?=_URL?>/<? echo$rw["pic"];?>" />
        
        <?
        echo "</td>";
   
    echo "<td>".$rw["name"]."</td>";
    echo "<td>".cat_translate($rw["cat"])."</td>";
    $text=$rw["text"];
    echo "<td>".mb_substr($text, 0, 100, mb_detect_encoding($text))."...</td>";
   
    echo "<td width=\"105px\">";
    echo "<a class=\"remove\" title=\"حذف\" onclick='if(!confirm(\"آیا شما مطمئن هستید?\"))return false;' href=./?page=admin&component=news&do-component=listnews&delit=".$rw["id"]."><i class=\"fa fa-times\"></i></a>";
  
    echo "<a class=\"edit\" title=\"ویرایش\" href=./?page=admin&component=news&do-component=newnews&id=".$rw["id"]."><i class=\"fa fa-pencil-square-o\"></i></a>";
    $flag=$rw['flag'];
    echo "<a href=./?page=admin&component=news&do-component=listnews&flag=".$rw["id"]." ".( 
    @$flag
      ? 'title="غیرفعال کردن" class="active"'
      : 'title="فعال کردن" class="disabl"' 
    )."><i class=\"fa fa-check-square\"></i></a></td>";
    echo "</tr>";
    
  }
  $link="/?page=admin&component=news&do-component=listnews";
  ?>  
  
</table>
<?=listmaker_paging($query1, $link, $tdd, $debug=false);?>
</div>
<?
}//else1
}

