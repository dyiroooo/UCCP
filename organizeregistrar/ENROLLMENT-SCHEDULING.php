<?php
include 'include/header.php';
include 'include/config.php';
?>

<!-- <div class="d-flex" id="wrapper"> -->
  <?php include 'include/sidebar.php'; ?>
  <div id="page-content-wrapper">
    <nav class="navbar navbar-expand-lg navbar-light bg-transparent py-4 px-4">
      <div class="d-flex align-items-center">
        <i class="fas fa-bars primary-text fs-4 me-3" id="menu-toggle"></i>
        <h2 class="fs-2 m-0">Registrar Dashboard</h2>
      </div>
    </nav>


  <div class="container py-3">
    <div class="row">
      <div class="col-md-12">
        <div class="card ">
          <div class="card-header">
            <h1 align = "center">LIST OF ENROLLMENT SCHOOLYEAR</h1>
            <form class=""  method="post" align="center">
        


              <div class="input-group mb-3">
                <input type="text" class="form-control" placeholder="Insert SchoolYear" aria-label="Insert SchoolYear"  name="Sy1" id="schoolyear1" value="" required>
                <button class="btn  btn-primary " type="button" id="button-addon2" name="add1"  onclick="addsy1()">ADD</button>
                  </div>
            </form>

           
            <form class=""  method="post" id="FORM" align="center">

              <!--<button type="button" name="open" class="btn btn-primary" id="BtnOpen" data-bs-toggle="modal" data-bs-target="#Open">Open</button>-->
              <button type="button" class="btn btn-primary openings">Open</button>


              <div class="modal" id="open1">
                <div class="modal-dialog">
                  <div class="modal-content">
                    <!-- Modal Header -->
                    <div class="modal-header">
                      <h4 class="modal-title">Enrollment</h4>
                    </div>
                    <!-- Modal body -->
                    <div class="modal-bodys">

                    </div>

                    <!-- Modal footer -->
                    <div class="modal-footer">
                      <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
                      <button type="button" name="update1" class="btn btn-primary" id="BtnUpdate1" data-bs-toggle="modal"  onclick="startEnroll()">
                        Start Enrollment</button>

              
                    </div>
                  </div>
                </div>
              </div>

              <button type="button" name="close" class="btn btn-danger" id="BtnClose" data-bs-toggle="modal"   onclick="closeenrollment()">
                Close Enrollment

          
              </button>
            </form>
          </div>

          <div class="card-body">
            <div class="" id="displayTable1"></div>
          </div>
        </div>
      </div>
    </div>
  </div>


  <div  id="edit1" class="modal fade"  role="dialog">
    <div class="modal-dialog modal-lg modal-dialog-scrollable">
      <div class="modal-content">
        <form class="" id="updateform" method="post">


          <div class="modal-header">
            <h4 class="modal-title">Update School Year</h4>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-bodyss" id="updateinfo">

            <div class="mx-3 mb-3">

              <label for="Courses" class="form-label">SCHOOL YEAR</label>
              <input type="text" class="form-control" id="updateSY1" placeholder="Update SCHOOL YEAR">

              <label for="Courses" class="form-label">SEMESTER</label>

              <select class="form-control" name="sem" id="updateSEM">
                <option value="" disabled>SELECT SEM</option>
                <option value="1st">1st</option>
                <option value="2nd">2nd</option>
                <option value="Summer">Summer</option>
              </select>

            </div>

          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-primary"  onclick="update1()">UPDATE</button>
            <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
            <input type="hidden"  id="hidden">
          </div>
        </form>
      </div>
    </div>
  </div>

  <?php
  include 'include/footer.php';
  ?>

  <script>

  $(document).ready(function(){
    var table =  $('#enrolltbl').DataTable();
    displayData1();


    $('.openings').click(function(){

      $.ajax({
        url: 'select-sy.php',
        type: 'post',
        success: function(response){
          $('.modal-bodys').html(response);
          $('#open1').modal('show');

        }
      });
    });

  })

  function displayData1(){

    var display ="true";

    $.ajax({

      url:'table-Enrollment.php',
      type: 'post',
      data: {display: display},
      success:function(data,status){
        $('#displayTable1').html(data);
      }
    })
  }


  function remove1(id){

    if(confirm('Are you sure you wantt to Reject This Applicant?')){

      $.ajax({
        url:'remove-sched.php',
        type:'post',
        data:{remove:id},
        success:function(data){
          displayData1();
          $('#row'+id).hide('slow');

        }

      });

    }
  }

  function edit1(uenrollid){
    $('#hidden').val(uenrollid);

    $.post("update-enrollment.php",{uenrollid:uenrollid},function(data,
      status){
        var id = JSON.parse(data);
        $('#updateSY1').val(id.schoolyear);
        $('#updateSEM').val(id.sem);
      });
      $('#edit1').modal("show");
    }


    function update1(){

      var updateSY1 = $('#updateSY1').val();
      var updateSEM = $('#updateSEM').val();
      var hidden= $('#hidden').val();


      $.post("update-enrollment.php", {
        updateSY1:updateSY1, hidden:hidden,updateSEM:updateSEM
      },function(data,status){
        displayData1();
        $('#edit1').modal("hide");
      });


      

    }


    function addsy1() {
  var schoolyearInput1 = $('#schoolyear1'); // Get the input field
  var schoolyear1 = schoolyearInput1.val().trim(); // Get the value of the input field and remove whitespace
  if (!schoolyear1) { // Check if the value is falsy (empty, null, undefined, false, 0, NaN)
    alert('Please enter a value.'); // Show an alert message to inform the user
    return; // Stop the function if the value is falsy
  }

  $.post("add-schoolyear-enrollment.php", {
    sy1: schoolyear1
  }, function(data, status) {
    schoolyearInput1.val(''); // Clear the input field

    if(data > 0){
      alert('Already Exist.'); // Show an alert message to inform the user
      return;
    }
    displayData1();
    alert('Value added to database.'); // Show an alert message to inform the user
  });
}


function startEnroll(){
var choices1 = $('#choices1').val();
var sem1 = $('#sem1').val();


$.ajax({

url:'open-enrollment.php',
type: 'post',
data: {choices1: choices1, sem1:sem1},
success:function(data,status){
  var json = JSON.parse(data);

  status = json.status;
  if(status =='success'){
    displayData1();
    $('#open1').modal("hide");
  }  
}
})
}

function closeenrollment(){
var close1 = "close";
$.ajax({

url:'close-enroll.php',
type: 'post',
data: {close1: close1},
success:function(data,status){
  var json = JSON.parse(data);

  status = json.status;
  if(status =='success'){
    displayData1();
   
  }  
}
})
}
    </script>
