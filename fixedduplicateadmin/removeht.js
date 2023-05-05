//REMOVE
    $(document).on('click', '.htremovedata', function(){
      var delht_id = $(this).attr('id');
      $.ajax({
        url: "delete_ht.php",
        type: "post",
        data: {delht_id: delht_id},
        success: function(data){
          $("#infoht_delete").html(data);
          $("#delhtData").modal('show');
        }
      });
      $(document).on('click', '#htdelete', function(){
        $.ajax({
          url: "delete_htquery.php",
          type: "post",
          data: $("#deletehtForm").serialize(),
          success: function(data){
            $("#delhtData").modal("hide");
            location.reload();
          }
        });
      });
    });
