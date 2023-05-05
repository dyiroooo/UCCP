//viewing
$(document).ready(function() {
  $('.viewprofinfo').click(function() {
  var profinfoid = $(this).data('id');
  //alert(adminid);
    $.ajax({
      url: 'view_profinfo.php',
      type: 'post',
      data: {profinfoid: profinfoid},
        success: function(response){
        $('.profinfoview-modal-body').html(response);
        $('#profinfoview').modal('show');
        }
    });
  });
});
