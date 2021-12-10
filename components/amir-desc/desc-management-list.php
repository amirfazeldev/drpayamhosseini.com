<? 
function desc_management_list()
{
if( ! admin_logged_in() ){
    return admin_login_form();
  } else if(@$_REQUEST['delit']){
   if(! $rs = dbq(" SELECT * FROM `description` WHERE `id`='".$_REQUEST['delit']."'")){
    echo "error on ".__FUNCTION__." at ".__LINE__;
    
  } else{
    if(! $rs1 = dbq(" DELETE FROM `description` WHERE `id`='".$_REQUEST['delit']."'")){
    echo "error on ".__FUNCTION__." at ".__LINE__;
  }else
    
    $rw = dbf($rs);
    @unlink($rw["location"]);
    ?>
    <div class="ok-p">اسلاید با موفقیت حذف شد.</div>
    <?  
  } 

  }
   if(! $rs = dbq(" SELECT * FROM `about` ")){
    echo "error on ".__FUNCTION__." at ".__LINE__;
  } else
  ?>
  <div class="do_admin_kadr">
  <h3>لیست تصاویر اسلایدر</h3>
  <div class="kadr">
    <table  style="" class="">
    <tr bgcolor="#E76163">
    
             <th>عکس</th>
             <th>نام</th>
             <th>آدرس</th>
                          
    </tr>
  
    <?

    while( $rw = dbf($rs) ){
    
    echo "<tr>";
    
    echo "<td style=\"width: 50px;padding: 0px\">";
    ?>
    
            <img class="log-edit-product" src="<?=_URL?>/<? echo$rw["location"];?>" />
        
        <?
        echo "</td>";
   
    echo "<td>".$rw["name"]."</td>";
    echo "<td>".$rw["url"]."</td>";

    
    echo "<td><a class=\"btn btn-danger\" onclick='if(!confirm(\"Are you sure?\"))return false;' href=./?page=admin&component=desc&desc=listdesc&delit=".$rw["id"]."> حذف <i class=\"fa fa-times\"></i></a>";
    echo "<a class=\"btn btn-primary\" href=./?page=admin&component=desc&desc=newdesc&id=".$rw["id"]."> ویرایش <i class=\"fa fa-pencil-square-o\"></a></td>";
    echo "</tr>";
    
  }
  
  ?>  
  
</table>
</div>
</div>
<?
}