//viewing
  $(document).ready(function() {
    $('.btnviewing').click(function() {
    var newsid = $(this).data('id');
    //alert(newsid);
      $.ajax({
        url: 'view_news.php',
        type: 'post',
        data: {newsid: newsid},
          success: function(response){
          $('.view-modal-body').html(response);
          $('#viewnews').modal('show');
          }
      });
    });
  });
