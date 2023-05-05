//viewing
$(document).ready(function() {
  $('.btnxoview').click(function() {
  var xoid = $(this).data('id');
  //alert(adminid);
    $.ajax({
      url: 'view_xo.php',
      type: 'post',
      data: {xoid: xoid},
        success: function(response){
        $('.viewxo-modal-body').html(response);
        $('#viewxobtn').modal('show');
        }
    });
  });
});
