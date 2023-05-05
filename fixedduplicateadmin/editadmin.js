//update view
$(document).on('click', '.admineditdata', function(){
  var editadmin_id = $(this).attr('id');
  $.ajax({
    url: "editadmin_data.php",
    type: "post",
    data: {editadmin_id: editadmin_id},
    success: function(data){
      $("#infoadmin_update").html(data);
      $("#editadminData").modal('show');
    }
  });
  //update button
  $(document).on('click', '#adminupdate', function(){
    $.ajax({
      url: "edit_adminquery.php",
      type: "post",
      data: $("#updateAdminForm").serialize(),
      success: function(data){
        $("#editadminData").modal("hide");
        location.reload();
      }
    });
  });

});
