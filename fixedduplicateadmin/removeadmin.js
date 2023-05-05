//REMOVE
    $(document).on('click', '.adminremovedata', function(){
      var deladmin_id = $(this).attr('id');
      $.ajax({
        url: "delete_admin.php",
        type: "post",
        data: {deladmin_id: deladmin_id},
        success: function(data){
          $("#infoadmin_delete").html(data);
          $("#deladminData").modal('show');
        }
      });
      $(document).on('click', '#admindelete', function(){
        $.ajax({
          url: "delete_adminquery.php",
          type: "post",
          data: $("#deleteadminForm").serialize(),
          success: function(data){
            $("#deladminData").modal("hide");
            location.reload();
          }
        });
      });
    });
