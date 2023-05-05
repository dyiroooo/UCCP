//REMOVE
    $(document).on('click', '.newsremovedata', function(){
      var del_newsid = $(this).attr('id');
      $.ajax({
        url: "delete_news.php",
        type: "post",
        data: {del_newsid: del_newsid},
        success: function(data){
          $("#info_newsdelete").html(data);
          $("#delnewsData").modal('show');
        }
      });
      
      $(document).on('click', '#newsdelete', function(){
        $.ajax({
          url: "delete_newsquery.php",
          type: "post",
          data: $("#deleteNewsform").serialize(),
          success: function(data){
            $("#delnewsData").modal("hide");
            location.reload();
          }
        });
      });
    });
