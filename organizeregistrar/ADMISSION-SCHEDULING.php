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
          <div class="container">
            <div class="card">
              <div class="card-header">
                <h1 align = "center">LIST OF ADMISSION SCHOOLYEAR</h1>
                <form class=""  method="post" align ="center">
                  <!-- <input class="form-control" type="text" name="Sy" value="" placeholder="Insert School Year" required>
                  <input type="submit" name="add" value="Add" class="btn btn-primary"> -->
                  <div class="input-group mb-3">
                <input type="text" class="form-control" placeholder="Insert SchoolYear" aria-label="Insert SchoolYear"  name="Sy" id="schoolyear" value="" required>
                <button class="btn  btn-primary " type="button" id="button-addon2" name="add"  onclick="addsy()">ADD</button>
                  </div>
                </form>

                

                <form class=""  method="post" id="FORM" align ="center">
                  <!-- <button type="button" name="open" class="btn btn-primary" id="BtnOpen" data-bs-toggle="modal" data-bs-target="#Open">Open</button> -->
                  
                  <div class="modal" id="Open">
                    <div class="modal-dialog">
                      <div class="modal-content">
                        <!-- Modal Header -->
                        <div class="modal-header">
                          <h4 class="modal-title">Admission</h4>
                        </div>
                        <!-- Modal body -->
                        <div class="modal-body">
                        
                        </div>

                        <!-- Modal footer -->
                        <div class="modal-footer">
                          <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
                          <button type="button" name="update" class="btn btn-primary" id="BtnUpdate"  data-bs-toggle="modal"  onclick="startAdd()">
                            Start Admission
                          
                          </button>
                        </div>
                      </div>
                    </div>
                  </div>
                  <button type="button" class="btn btn-primary opening">OPEN</i></button>
                  <button type="button" name="close1" class="btn btn-danger" id="BtnClose" data-bs-toggle="modal" onclick="closeAdd()">
                    Close Admission
                  </button>
                </form>
              </div>
              <div class="card-body">
                <div class="" id="displayTable"></div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

    <div  id="edit3" class="modal fade"  role="dialog">
      <div class="modal-dialog modal-lg modal-dialog-scrollable">
        <div class="modal-content">
          <form class="" id="updateform" method="post">

            <div class="modal-header">
              <h4 class="modal-title">Update School Year</h4>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-bodys" id="updateinfo">

              <div class="mx-3 mb-3">

                <label for="Courses" class="form-label">SCHOOL YEAR</label>
                <input type="text" class="form-control" id="updateSY" placeholder="Update SCHOOL YEAR">

              </div>

            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-primary"   onclick="update3()">UPDATE</button>
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

      displayData();

      $('.opening').click(function(){

        $.ajax({
          url: 'select-sy-admission.php',
          type: 'post',
          success: function(response){
            $('.modal-body').html(response);
            $('#Open').modal('show');

          }
        });
      });

    })


    function displayData(){

      var display ="true";

      $.ajax({

        url:'table-admission.php',
        type: 'post',
        data: {display: display},
        success:function(data,status){
          $('#displayTable').html(data);
        }


      })

    }

    function remove(id){

      if(confirm('Are you sure you wantt to Reject This Applicant?')){

        $.ajax({
          url:'remove-sched-admission.php',
          type:'post',
          data:{remove:id},
          success:function(data){
            displayData();
            $('#row'+id).hide('slow');

          }

        });

      }
    }




    function edit(uid){
      $('#hidden').val(uid);

      $.post("update-admission.php",{uid:uid},function(data,
        status){
          var id = JSON.parse(data);

          $('#updateSY').val(id.schoolyear);

        });
        $('#edit3').modal("show");
      }




      function update3(){

        var updateSY = $('#updateSY').val();
        var hidden= $('#hidden').val();


        $.post("update-admission.php", {
          updateSY:updateSY, hidden:hidden
        },function(data,status){
          displayData();
          $('#edit3').modal("hide");
        });

      }

 function addsy() {
  var schoolyearInput = $('#schoolyear'); // Get the input field
  var schoolyear = schoolyearInput.val().trim(); // Get the value of the input field and remove whitespace
  if (!schoolyear) { // Check if the value is falsy (empty, null, undefined, false, 0, NaN)
    alert('Please enter a value.'); // Show an alert message to inform the user
    return; // Stop the function if the value is falsy
  }

  $.post("add-schoolyear-admission.php", {
    sy: schoolyear
  }, function(data, status) {
    schoolyearInput.val(''); // Clear the input field
    displayData();
    alert('Value added to database.'); // Show an alert message to inform the user
  });
}





function startAdd(){
var choice = $('#choice').val();
$.ajax({

url:'open-add.php',
type: 'post',
data: {choice: choice},
success:function(data,status){
  var json = JSON.parse(data);

  status = json.status;
  if(status =='success'){
    displayData();
    $('#Open').modal("hide");
  }  
}
})
}


function closeAdd(){
var close = "close";
$.ajax({

url:'close-add.php',
type: 'post',
data: {close: close},
success:function(data,status){
  var json = JSON.parse(data);

  status = json.status;
  if(status =='success'){
    displayData();
   
  }  
}
})
}





      </script>

    </div>
