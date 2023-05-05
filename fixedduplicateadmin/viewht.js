//viewing
$(document).ready(function() {
  $('.btnhtview').click(function() {
  var htid = $(this).data('id');
  //alert(adminid);
    $.ajax({
      url: 'view_ht.php',
      type: 'post',
      data: {htid: htid},
        success: function(response){
        $('.viewht-modal-body').html(response);
        $('#viewhtbtn').modal('show');
        }
    });
  });
});
