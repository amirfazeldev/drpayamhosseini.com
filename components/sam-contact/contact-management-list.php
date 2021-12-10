<? 
function contact_management_list()

{

if( ! admin_logged_in() ){

    return admin_login_form();

  } else if(@$_REQUEST['delit']){

   if(! $rs = dbq(" SELECT * FROM `contact` WHERE `id`='".$_REQUEST['delit']."'")){

    echo "error on ".__FUNCTION__." at ".__LINE__;

    

  } else{

    if(! $rs1 = dbq(" DELETE FROM `contact` WHERE `id`='".$_REQUEST['delit']."'")){

    echo "error on ".__FUNCTION__." at ".__LINE__;

  }else

    

    $rw = dbf($rs);

    @unlink($rw["location"]);

    ?>

    <div class="ok-p">پرسش با موفقیت حذف شد.</div>

    <?  

  } 



  }

   if(! $rs = dbq(" SELECT * FROM `contact` ")){

    echo "error on ".__FUNCTION__." at ".__LINE__;

  } else

  ?>

  <div class="kadr">

    <table  style="" class="table">

    <tr bgcolor="#E76163">

      <th>نام</th>
      <th>موضوع پیام</th>
      <th>متن پیام</th>
      <th>تاریخ</th>
      <th>وضعیت</th>              

    </tr>
    <?

    while( $rw = dbf($rs) ){
    echo "<tr>";       

    echo "<td>".$rw["name"]."</td>";

    echo "<td>".$rw["sub"]."</td>";

    $string=$rw["text"];     

    echo "<td>".mb_substr($string, 0, 100, mb_detect_encoding($string))."...</td>";
    echo "<td>".vaght_2_taghvim(u2vaght($rw["date_created"]),0,0,1)."</td>"; 
    echo "<td>".(@$rw['backtext'] ? 'پاسخ داده شده' : 'پاسخ داده نشده')."</td>"; 
    echo "<td width=\"80px\">";
    echo "<a class=\"remove\" title=\"حذف\" onclick='if(!confirm(\"آیا شما مطمئن هستید?\"))return false;' href=./?page=admin&component=contact&contact=listcontact&delit=".$rw["id"]."><i class=\"fa fa-times\"></i></a>";
    echo "<a class=\"edit\" title=\"پاسخ\" href=./?page=admin&component=contact&contact=showcontact&id=".$rw["id"]."><i class=\"fa fa-reply\"></i></td>";

    echo "</tr>";  

  } 

  ?>
</table>
</div>
<?
}