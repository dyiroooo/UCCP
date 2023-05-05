//REMOVE
    $(document).on('click', '.xoremovedata', function(){
      var delxo_id = $(this).attr('id');
      $.ajax({
        url: "delete_xo.php",
        type: "post",
        data: {delxo_id: delxo_id},
        success: function(data){
          $("#infoxo_delete").html(data);
          $("#delxoData").modal('show');
        }
      });
      $(document).on('click', '#xodelete', function(){
        $.ajax({
          url: "delete_xoquery.php",
          type: "post",
          data: $("#deletexoForm").serialize(),
          success: function(data){
            $("#delxoData").modal("hide");
            location.reload();
          }
        });
      });
    });
