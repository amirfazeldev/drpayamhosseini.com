<? 

function uplod_management_list()

{

if( ! admin_logged_in() ){ 

    return admin_login_form();

  } else if(@$_REQUEST['delit']){

     if(! $rs = dbq(" SELECT * FROM `uplod` WHERE `id`='".$_REQUEST['delit']."'")){

      echo "error on ".__FUNCTION__." at ".__LINE__;      

     } else if(! $rs1 = dbq(" DELETE FROM `uplod` WHERE `id`='".$_REQUEST['delit']."'")){

      echo "error on ".__FUNCTION__." at ".__LINE__;

      }else{      

        $rw = dbf($rs);

        @unlink($rw["file"]);

        ?>

        <div class="ok-p">فایل با موفقیت حذف شد.</div>

        <?

      }  

  }else if(@$_REQUEST['flag']){

      toggl_flag("uplod");

  }



   if(! $rs = dbq(" SELECT * FROM `uplod` ")){

    echo "error on ".__FUNCTION__." at ".__LINE__;

  } else if( ! $rw = dbf($rs)){

    ?>

    <div class="convbox">

        هنوز موردی ثبت نشده است

       <br><br>

        <a class="btn btn-primary" href="./?page=admin&component=uplod&uplod=newuplod">ثبت فایل جدید</a>

    </div>

    

    <?

  }else{

  ?>

  <div class="kadr">

    <table  style="" class="table">

    <tr bgcolor="#E76163">

    

             <th>عکس</th>

             <th>لینک</th>

                          

    </tr>

  

    <?

    if(! $rs = dbq(" SELECT * FROM `uplod` ")){

    echo "error on ".__FUNCTION__." at ".__LINE__;

    }

    while( $rw = dbf($rs) ){

    

    echo "<tr>";

    

    echo "<td style=\"width: 50px;padding: 0px\">";

    ?> <img class="log-edit-product" src="<?=_URL?>/<? echo$rw["file"];?>" /><?

        echo "</td>";

    $url=_URL."/".$rw["file"];

    echo "<td>".$url."</td>";

   

    echo "<td width=\"30px\">";

    echo "<a class=\"remove\" title=\"حذف\" onclick='if(!confirm(\"آیا شما مطمئن هستید?\"))return false;' href=./?page=admin&component=uplod&uplod=listuplod&delit=".$rw["id"]."><i class=\"fa fa-times\"></i></a>";

  

    echo "</td>";

    echo "</tr>";

    

  }

  

  ?>  

  

</table>

</div>

<?

}

}



