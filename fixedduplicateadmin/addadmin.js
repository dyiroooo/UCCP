//add
$(document).ready(function(){
  $(document).on('click', '#btnsaveadmin', function(){
    var username=$("#admin_username").val();
    var password=$("#admin_password").val();
    var email=$("#admin_email").val();
    var phone=$("#admin_phone").val();

      if (username==""){
        $("#lblusername").html("Do Not Leave this Empty!");
      } else if(password==""){
        $("#lblpassword").html("Do Not Leave this Empty!");
      } else if (email=="") {
        $("#lblemail").html("Do Not Leave this Empty!");
      } else if (phone=="") {
        $("#lblphone").html("Invalid Input or Blank");
      } else {
        $.ajax({
          url: "add_admin.php",
          type: "post",
          data: {username:username, password:password, email:email, phone:phone},
          success:function(data){
            $("#addadminaccount").modal('hide');
            location.reload();
          }
        });
      }
  });
});
