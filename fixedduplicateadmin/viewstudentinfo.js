//viewing
$(document).ready(function() {
  $('.viewstudentinfo').click(function() {
  var studentinfoid = $(this).data('id');
  //alert(adminid);
    $.ajax({
      url: 'view_studentinfo.php',
      type: 'post',
      data: {studentinfoid: studentinfoid},
        success: function(response){
        $('.studentinfoview-modal-body').html(response);
        $('#stdinfoview').modal('show');
        }
    });
  });
});
