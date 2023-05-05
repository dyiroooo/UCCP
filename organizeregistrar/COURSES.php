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

     <!-- Modal -->
    <div class="modal fade" id="completeModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">COURSES</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
              <div class="mb-3">
                <label for="Courses" class="form-label">COURSES</label>
                <input type="text" class="form-control" id="Courses" placeholder="ADD COURSES">

                <label for="Courses" class="form-label">Abbreviation</label>
                <input type="text" class="form-control" id="Abbreviation" placeholder="Enter Abbreviation">

              </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            <button type="button" class="btn btn-primary"  data-bs-dismiss="modal" onclick="addcourses()">ADD</button>
          </div>
        </div>
      </div>
    </div>

<!-- Updaate Modal -->
    <div class="modal fade" id="updateModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Update Details</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
              <div class="mb-3">
                <label for="Courses" class="form-label">COURSES</label>
                <input type="text" class="form-control" id="updatecourses" placeholder="ADD COURSES">

                <label for="Courses" class="form-label">Abbreviation</label>
                <input type="text" class="form-control" id="updateAbbreviation" placeholder="Enter Abbreviation">

                <!-- <input type="text" class="form-control" id="updatestatus" placeholder="Set Status"> -->
                <label for="" class="form-label mt-2">Status</label>
                <select class="form-control" name="" id="updatestatus">

                          <option value="">Select</option>
                          <option value="Enable">Enable</option>
                          <option value="Disable">Disable</option>


                </select>

              </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            <button type="button" class="btn btn-primary"  onclick="u()" data-bs-dismiss="modal">Update</button>
            <input type="hidden" id="hiddendata">
          </div>
        </div>
      </div>
    </div>




    <div class="container my-3 ">
         <div class="row">
        <div class="col-md-12">
            <div class="card">
              <div class="card-header">
                <h1 align = "center">COURSES</h1>
              </div>
                <div class="card-body">

        <!-- Button trigger modal -->
        <button type="button" class="btn btn-primary col-sm-2 mb-3" data-bs-toggle="modal" data-bs-target="#completeModal">
          <i class="fa fa-plus"></i>
        </button>

        <!-- <div class="" id="displayTable"></div> -->

        <div class="table-responsive">
          <table class="table text-center cell-border table-hover" id="course" style="width:100%;">
            <thead>
              <tr >
            <th class="text-center" width="40%">Course</th>
            <th class="text-center" width="20%">Abbreviation</th>
            <th class="text-center" width="20%">Status</th>
            <th class="text-center" width="20%">Operation</th>
              </tr>
            </thead>
          </table>
         </div>
        </div>
    </div>
 </div>
</div>
</div>


<script type="text/javascript">

$(document).ready(function(){

  // displayData();
  $('#course').DataTable({
    'serverside':true,
    'processing':true,
    'paging':true,
    "columnDefs": [
     {"className": "dt-center", "targets": "_all"},

 ],

                'ajax':{

                  'url': 'table-course.php',
                  'type':'post',

                },
                'fnCreateRow':function(nRow,aData,iDataIndex){
                  $(nRow).attr('id',aData[0]);
                },
              });
});


// function displayData(){
//
//     var display ="true";
//
//     $.ajax({
//
//         url:'table-course.php',
//         type: 'post',
//         data: {display: display},
//         success:function(data,status){
//             $('#displayTable').html(data);
//         }
//
//
//     })
//
// }



  function addcourses(){
      var course =$('#Courses').val();
      var abbreviation = $('#Abbreviation').val();

        $.ajax({

            url:'add-course.php',
            type: 'post',
            data: {course: course, abbreviation:abbreviation},
            success:function(data,status){
              var json = JSON.parse(data);

              status = json.status;
              if(status =='success'){

          var q=  $('#course').DataTable().ajax.reload();
                alert('successfully added');

              }
                $('#Courses').val('');
                $('#Abbreviation').val('');
            }
        })

  }

  // function Remove(r){
  //       $.ajax({
  //
  //           url:'remove-course.php',
  //           type: 'post',
  //           data: {remove: r},
  //           success:function(data,status){
  //             if(status =='success'){
  //
  //         var r=  $('#course').DataTable().ajax.reload();
  //
  //
  //             }
  //           }
  //       })
  // }


function update(update){

$('#hiddendata').val(update);
$.post("update-course.php",{update:update},function(data,
  status){
    var userid= JSON.parse(data);

    $('#updatecourses').val(userid.courses);
    $('#updateAbbreviation').val(userid.abbreviation);
    $('#updatestatus').val(userid.status);
});
 $('#updateModal').modal("show");

   }


function u(){
  var updatestatus = $('#updatestatus').val();
  var updateCourse = $('#updatecourses').val();
  var hiddendata = $('#hiddendata').val();
  var updateAbbreviation= $('#updateAbbreviation').val();

  $.post("update-course.php", {
updateCourse:updateCourse, hiddendata:hiddendata ,updatestatus:updatestatus, updateAbbreviation:updateAbbreviation
},function(data,status){

  var jsons = JSON.parse(data);
   status = jsons.status;
   if(status =='success'){
         var update=  $('#course').DataTable().ajax.reload();
   }



});

}


</script>