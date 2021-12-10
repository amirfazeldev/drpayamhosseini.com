<?
function users_mg_list()
{
if( ! admin_logged_in() ){ 
    return admin_login_form();
  } else if(@$_REQUEST['delit']){
	   if(! $rs = dbq(" SELECT * FROM `users` WHERE `id`='".$_REQUEST['delit']."'")){
	    echo "error on ".__FUNCTION__." at ".__LINE__;	    
	   } else if(! $rs1 = dbq(" DELETE FROM `users` WHERE `id`='".$_REQUEST['delit']."'")){
	    echo "error on ".__FUNCTION__." at ".__LINE__;
	    }else{	    
		    $rw = dbf($rs);
		    @unlink($rw["img"]);
		    ?>
		    <div class="ok-p">کاربر با موفقیت حذف شد.</div>
		    <?
	    }  
  }else if(@$_REQUEST['flag']){
  		toggl_flag("users");
  } 

   if(! $rs = dbq(" SELECT * FROM `users` ")){
    echo "error on ".__FUNCTION__." at ".__LINE__;
  } else
  ?>
  <div class="kadr">
    <table  style="" class="table">
    <tr bgcolor="#E76163">
    
             <th>عکس</th>
             <th>نام</th>
             <th>تلفن</th>
             <th>ایمیل</th>                       
    </tr>
  
    <?

    while( $rw = dbf($rs) ){
    
    echo "<tr>";

		if ($rw["img"]) {
			$img=$rw["img"];
		}else{
			$img="img/no-avatar-big.png";
		}
	
	echo "<td style=\"width: 50px;padding: 0px\"><img  src="._URL."/".$img."></td> ";      
    echo "<td>".$rw["name"]."</td>";
    echo "<td>".$rw["tell"]."</td>";
    echo "<td>".$rw["email"]."</td>";
                   
    echo "<td width=\"105px\">";
    echo "<a class=\"remove\" title=\"حذف\" onclick='if(!confirm(\"آیا شما مطمئن هستید?\"))return false;' href=./?page=admin&component=users-mg&users=listusers&delit=".$rw["id"]."><i class=\"fa fa-times\"></i></a>";
  
    echo "<a class=\"edit\" title=\"نمایش جزئیات\" href=./?page=admin&component=users-mg&users=showusers&id=".$rw["id"]."><i class=\"fa fa-info-circle\"></i></a>";
    $flag=$rw['flag'];
    echo "<a href=./?page=admin&component=users-mg&users=listusers&flag=".$rw["id"]." ".( 
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