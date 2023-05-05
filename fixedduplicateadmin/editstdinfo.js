//update view
$(document).on('click', '.stdeditdata', function(){
  var editstudent_id = $(this).attr('id');
  $.ajax({
    url: "editstd_data.php",
    type: "post",
    data: {editstudent_id: editstudent_id},
    success: function(data){
      $("#infostudent_update").html(data);
      $("#editstdData").modal('show');
    }
  });

  //update button
  $(document).on('click', '#stdupdate', function(){
    $.ajax({
      url: "edit_stdquery.php",
      type: "post",
      data: $("#updateStdForm").serialize(),
      //data: {stdname: stdname, stdgender: stdgender, stdbirthday: stdbirthday, stdemail: stdemail, stdphone:stdphone, stdusername:stdusername, stdpassword:stdpassword },
      success: function(data){
        $("#editstdData").modal("hide");
        location.reload();
      }
    });
  });

});
