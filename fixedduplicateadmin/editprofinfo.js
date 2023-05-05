//update view
$(document).on('click', '.profeditdata', function(){
  var editprof_id = $(this).attr('id');
  $.ajax({
    url: "editprof_data.php",
    type: "post",
    data: {editprof_id: editprof_id},
    success: function(data){
      $("#infoprofessor_update").html(data);
      $("#editprofData").modal('show');
    }
  });

  //update button
  $(document).on('click', '#profupdate', function(){
    $.ajax({
      url: "edit_profquery.php",
      type: "post",
      data: $("#updateProfForm").serialize(),
      success: function(data){
        $("#editprofData").modal("hide");
        location.reload();
      }
    });
  });

});
