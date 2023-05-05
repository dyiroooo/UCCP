//viewing
$(document).ready(function() {
  $('.viewadmin').click(function() {
  var adminid = $(this).data('id');
  //alert(adminid);
    $.ajax({
      url: 'view_admin.php',
      type: 'post',
      data: {adminid: adminid},
        success: function(response){
        $('.adminview-modal-body').html(response);
        $('#adminaccview').modal('show');
        }
    });
  });
});
