<? 
function faq_management_list()
{
if( ! admin_logged_in() ){ 
    return admin_login_form();
  } else if(@$_REQUEST['delit']){
     if(! $rs = dbq(" SELECT * FROM `faq` WHERE `id`='".$_REQUEST['delit']."'")){
      echo "error on ".__FUNCTION__." at ".__LINE__;      
     } else if(! $rs1 = dbq(" DELETE FROM `faq` WHERE `id`='".$_REQUEST['delit']."'")){
      echo "error on ".__FUNCTION__." at ".__LINE__;
      }else{      
        ?>
        <div class="ok-p">سوال مورد نظر حذف شد</div>
        <?
      }  
  }else if(@$_REQUEST['flag']){
      toggl_flag("faq");
  }

   if(! $rs = dbq(" SELECT * FROM `faq` ")){
    echo "error on ".__FUNCTION__." at ".__LINE__;
  } else
  ?>
  
<!--   <h3>لیست تصاویر اسلایدر</h3> -->
  <div class="kadr">
    <table  style="" class="table">
    <tr bgcolor="#E76163">
    
             <th>سوال</th>
             <th>جواب</th>
                          
    </tr>
    <?

    while( $rw = dbf($rs) ){
    
    echo "<tr>";
   
    echo "<td>".$rw["question"]."</td>";
    $awnser=$rw["awnser"];     
    echo "<td>".mb_substr($awnser, 0, 100, mb_detect_encoding($awnser))."...</td>";
     
    echo "<td width=\"105px\">";
    echo "<a class=\"remove\" title=\"حذف\" onclick='if(!confirm(\"آیا شما مطمئن هستید?\"))return false;' href=./?page=admin&component=faq_mg&faq=listfaq&delit=".$rw["id"]."><i class=\"fa fa-times\"></i></a>";
  
    echo "<a class=\"edit\" title=\"ویرایش\" href=./?page=admin&component=faq_mg&faq=newfaq&id=".$rw["id"]."><i class=\"fa fa-pencil-square-o\"></i></a>";
    $flag=$rw['flag'];
    echo "<a href=./?page=admin&component=faq_mg&faq=listfaq&flag=".$rw["id"]." ".( 
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

