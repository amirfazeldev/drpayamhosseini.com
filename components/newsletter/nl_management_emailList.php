<?
function nl_management_emailList(){

if( ! admin_logged_in() ){ 

    return admin_login_form();

  } else if(@$_REQUEST['delit']){

     if(! $rs = dbq(" SELECT * FROM `newsletter` WHERE `id`='".$_REQUEST['delit']."'")){

      echo "error on ".__FUNCTION__." at ".__LINE__;      

     } else if(! $rs1 = dbq(" DELETE FROM `newsletter` WHERE `id`='".$_REQUEST['delit']."'")){

      echo "error on ".__FUNCTION__." at ".__LINE__;

      }else{
        ?>

        <div class="ok-p">اشتراک مورد نظر با موفقیت حذف شد.</div>

        <?

      }  

  }else if(@$_REQUEST['flag']){

      toggl_flag("newsletter");

  } else if (@$_REQUEST['alldelit']) {
    //$list=$GET['alldelit'];
    $list=explode( "," , $_REQUEST['alldelit']);
    $del_param = null;
    $count_mail = count($list)-1;
        
    for($i = 0; $i < $count_mail; $i++){
        $del_param .= "`id`='".$list[$i]."'";
        if($i + 1 < $count_mail){
            $del_param .= " OR ";
        }
    }
     if($count_mail > 0){
            if(!$rs1 = dbq(" DELETE FROM `newsletter` WHERE $del_param")) {
                echo "error on ".__FUNCTION__." at ".__LINE__;
            } else{
                echo ' <div class="ok-p">تعداد ' . $count_mail .' ردیف با موفقیت حذف شد!' . '</div>';
            }
        } else{
            echo ' <div class="error-p">فیلدی برای حذف انتخاب نشده است!' . '</div>';
        }
  }
###################################################################################
# 
# the list
  $tdd = 10;
  $stt = $tdd * intval(@$_REQUEST['p']); 
  $query1 = "SELECT * FROM `newsletter` ORDER BY `id` DESC LIMIT $stt , $tdd";
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
        <th> <input type="checkbox" id="select_all"></th>
        <th>آدرس</th>                          
    </tr>  
<?
    while( $rw = dbf($rs) ){    
    echo "<tr>";
    echo "<td width=\"20px\"><input type=\"checkbox\" value=\"".$rw["id"]."\" name=\"checkbox-delit\" class=\"checkbox-delit\"></td>";
    echo "<td class=\"center\">".$rw["email"]."</td>";
    echo "<td width=\"105px\">";
    $flag=$rw['flag'];
    echo "<a class=\"remove\" title=\"حذف\" onclick='if(!confirm(\"آیا شما مطمئن هستید?\"))return false;' href=./?page=admin&component=nl_management&fanc=nl_management_list&delit=".$rw["id"]."><i class=\"fa fa-times\"></i></a>"; 
    echo "<a href=./?page=admin&component=nl_management&fanc=nl_management_list&flag=".$rw["id"]." ".( 

    @$flag

      ? 'title="غیرفعال کردن" class="active"'

      : 'title="فعال کردن" class="disabl"' 

    )."><i class=\"fa fa-check-square\"></i></a></td>"; 
    echo "</tr>";    
  } 
    echo "<tr>";
    echo "<td width=\"20px\">";
    echo "<a href=# class=\"remove\" id=\"remove-all\" title=\"حذف گروهی \" onclick='remove_all(\"nl_management\")'><i class=\"fa fa-times\"></i></a></td>";   
    echo "</tr>"; 
  $link="/?page=admin&component=nl_management&fanc=listnl"; 
?>   
</table>
<?=listmaker_paging($query1, $link, $tdd, $debug=false);?>
</div>
	<?
}//end else1
}

