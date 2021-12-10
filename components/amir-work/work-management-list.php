<? 
function work_management_list()
{
if( ! admin_logged_in() ){ 
    return admin_login_form();
  } else if(@$_REQUEST['delit']){
     if(! $rs = dbq(" SELECT * FROM `portfolio` WHERE `id`='".$_REQUEST['delit']."'")){
      echo "error on ".__FUNCTION__." at ".__LINE__;      
     } else if(! $rs1 = dbq(" DELETE FROM `portfolio` WHERE `id`='".$_REQUEST['delit']."'")){
      echo "error on ".__FUNCTION__." at ".__LINE__;
      }else{      
        $rw = dbf($rs);
        @unlink($rw["image"]);
        ?>
        <div class="ok-p">پرسش با موفقیت حذف شد.</div>
        <?
      }  
  }else if(@$_REQUEST['flag']){
      toggl_flag("work");
  }

   if(! $rs = dbq(" SELECT * FROM `portfolio` ")){
    echo "error on ".__FUNCTION__." at ".__LINE__;
  } else
  ?>
  
<!--   <h3>لیست تصاویر اسلایدر</h3> -->
  <div class="kadr">
    <table  style="" class="table">
    <tr bgcolor="#E76163">
    
             <th>عکس</th>
             <th>نام</th>
             <th>دسته</th>
             <th>آدرس</th>
                          
    </tr>
  
    <?

    while( $rw = dbf($rs) ){
    
    echo "<tr>";
    
    echo "<td style=\"width: 50px;padding: 0px\">";
    ?>
    
            <img class="log-edit-product" src="<?=_URL?>/<? echo$rw["image"];?>" />
        
        <?
        echo "</td>";
   
    echo "<td>".$rw["name"]."</td>";
    echo "<td>".cat_translate($rw["cat_id"])."</td>";
    echo "<td>".$rw["url"]."</td>";
   
    echo "<td width=\"105px\">";
    echo "<a class=\"remove\" title=\"حذف\" onclick='if(!confirm(\"آیا شما مطمئن هستید?\"))return false;' href=./?page=admin&component=work-sample&work=listwork&delit=".$rw["id"]."><i class=\"fa fa-times\"></i></a>";
  
    echo "<a class=\"edit\" title=\"ویرایش\" href=./?page=admin&component=work-sample&work=newwork&id=".$rw["id"]."><i class=\"fa fa-pencil-square-o\"></i></a>";
    $flag=$rw['flag'];
    echo "<a href=./?page=admin&component=work-sample&work=listwork&flag=".$rw["id"]." ".( 
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

