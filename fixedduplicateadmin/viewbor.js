//viewing
$(document).ready(function() {
  $('.btnborview').click(function() {
  var borid = $(this).data('id');
  //alert(adminid);
    $.ajax({
      url: 'view_bor.php',
      type: 'post',
      data: {borid: borid},
        success: function(response){
        $('.viewbor-modal-body').html(response);
        $('#viewborbtn').modal('show');
        }
    });
  });
});
