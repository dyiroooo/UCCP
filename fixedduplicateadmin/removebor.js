//REMOVE
    $(document).on('click', '.borremovedata', function(){
      var delbor_id = $(this).attr('id');
      $.ajax({
        url: "delete_bor.php",
        type: "post",
        data: {delbor_id: delbor_id},
        success: function(data){
          $("#infobor_delete").html(data);
          $("#delborData").modal('show');
        }
      });
      $(document).on('click', '#bordelete', function(){
        $.ajax({
          url: "delete_borquery.php",
          type: "post",
          data: $("#deleteborForm").serialize(),
          success: function(data){
            $("#delborData").modal("hide");
            location.reload();
          }
        });
      });
    });
