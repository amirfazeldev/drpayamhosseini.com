$(document).ready(function() {
  var x = false;
  $("#select_all").on('click', function(){
     if (!x){
      $('.checkbox-delit').prop('checked', true);
      x = true;
     }
     else {
      $('.checkbox-delit').prop('checked', false);
      x = false;
     }
  });
});
function remove_all(components) {
  var ckbox = $("input[name='checkbox-delit']");
  var chkId = '';
  if(!confirm("آیا شما مطمئن هستید?")){
    return false;
  }else if (ckbox.is(':checked')) {
      $("input[name='checkbox-delit']:checked").each ( function() {
        chkId += $(this).val() + ",";
        //chkId = chkId.slice(0, -1);
    });       
       //alert ( $(this).val() ); // return all values of checkboxes checked
       //alert(chkId); // return value of checkbox checked
       location.href='./?page=admin&component='+components+'&fanc='+components+'_list&alldelit='+chkId;
       
  }else{
    alert("موردی برای حذف انتخاب نشده است")
  } 
 }  