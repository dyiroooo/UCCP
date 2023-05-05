<?php
// session_start();
include 'include/config.php';

$sql = "SELECT * FROM `uccp_professor`";
$result = mysqli_query($conn,$sql);
$namess = $_SESSION['names'];

?>


<!-- Updaate Modal -->
  <div class="modal fade" id="setgrade" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Update Details</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            <div class="mb-3">
              <label for="Courses" class="form-label">FULLNAME</label>
              <input type="text" class="form-control" id="G_FULLNAME" readonly >

              <label for="Courses" class="form-label">COURSE/YEAR/SECTION</label>
              <input type="text" class="form-control" id="G_CYS" readonly>
              
            <label for="Courses" class="form-label">SUBJECT CODE</label>
              <input type="text" class="form-control" id="G_S" readonly>

              <label for="Courses" class="form-label">MIDTERMS</label>
              <input type="text" class="form-control" id="G_MIDTERM" placeholder="ADD MIDTERM GRADES" >

              <label for="Courses" class="form-label">FINALS</label>
              <input type="text" class="form-control" id="G_FINALS" placeholder="ADD FINAL GRADES">

              <label for="Courses" class="form-label">AVERAGE</label>
              <input type="text" class="form-control" id="G_AVERAGE" readonly>



            </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
          <button type="button" class="btn btn-primary"  onclick="setGrade()" data-bs-dismiss="modal">Update</button>
          <input type="hidden" id="hiddendataG">
        </div>
      </div>
    </div>
  </div>





  <!-- set status  -->
    <div class="modal fade" id="setRemarks" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Update Details</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
              <div class="mb-3">

                <label for="Courses" class="form-label">REMARKS</label>
                    <select class="form-control" name="" id="G_REMARKS">
                        <option value="" selected disabled>SELECT</option>
                        <option value="O.D">Official Drop</option>
                        <option value="U.D">Unofficial Drop</option>
                        <option value="INC">INCOMPLETE</option>


                    </select>

              </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            <button type="button" class="btn btn-primary"  onclick="setRemarks()" data-bs-dismiss="modal">SET REMARKS</button>
              <input type="hidden" id="hiddendataG">
          </div>
        </div>
      </div>
    </div>




<?php

include ("include/config.php");

$q = "SELECT  DISTINCT courseyearsection  FROM `uccp_sched` WHERE `professor` = '$namess'";
$results = mysqli_query($conn,$q);

?>

<div class="container py-3">
  <div class="row">
    <div class="col-md-12">
      <div class="card">
        <div class="card-header">
          <h3 align = "center">LIST OF PASSERS</h3>
          <div class="mb-4 text-center mt-4 ">
            <select class="form-control" name="SY" id="section" >
              <option value="">Select</option>
              <?php
              while($r = mysqli_fetch_assoc($results)){
                echo '<option>'.$r['courseyearsection'].'</option>';;
              }
              ?>
            </select>
          </div>
        </div>


        <div class="card-body">


          <div class="table-responsive">
            <table class="table text-center  cell-border table-striped table-hover" id="xg" style="width:100%;">
              <thead>
                <tr >
                  <th class="text-center">FULLNAME</th>
                  <th class="text-center">COURSE/YEAR/SECTION</th>
                  
                  <th class="text-center">SUBJECT CODE</th>
                  <th class="text-center">MIDTERM</th>
                  <th class="text-center">FINALTERM</th>
                  <th class="text-center">AVERAGE</th>
                  <th class="text-center">REMARKS</th>
                  <th class="text-center">OPERATION</th>
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

$("document").ready(function () {

  var x= $('#xg').DataTable({
    'serverside':true,
    'processing':true,
    'paging':true,
    "columnDefs": [
      {"className": "dt-center", "targets": "_all"},

    ],
    'ajax':{

      'url': 'sidebarpage/table-grade.php',
      'type':'post',

    },
    'fnCreateRow':function(nRow,aData,iDataIndex){
      $(nRow).attr('id',aData[0]);
    },
  });


  $('input[type="search"]').on( 'keyup', function () {
    var s =($(this).val());
    if(s == ""){
      $('#section').val('').change();
    }
  } );


  $('#section').on('change', function () {

    var sy = $(this).val();
    x.search( this.value ).draw();
  });

});


function updateG(update){

$('#hiddendataG').val(update);
$.post("sidebarpage/update-grade.php",{update:update},function(data,
status){
  var c = JSON.parse(data);

  $('#G_FULLNAME').val(c.name);
  $('#G_CYS').val(c.courseyearsection);
  $('#G_MIDTERM').val(c.midterm);
  $('#G_FINALS').val(c.finals);
  $('#G_AVERAGE').val(c.average);
    $('#G_S').val(c.subjectcode);



});
$('#setgrade').modal("show");

 }



function setGrade(){


  var hiddendataG = $('#hiddendataG').val();
  var name = $('#G_FULLNAME').val();
  var cys = $('#G_CYS').val();
  var m = $('#G_MIDTERM').val();
  var f = $('#G_FINALS').val();
  var a = $('#G_AVERAGE').val();
  var s = $('#G_S').val();




$.post("sidebarpage/update-grade.php", {
 hiddendataG:hiddendataG ,name:name,cys:cys,m:m,a:a,f:f,s:s
},function(data,status){
  var json = JSON.parse(data);
  status = json.status;
  if(status =='success'){

$('#xg').DataTable().ajax.reload();


  }
});

}



function updateRemarks(x){

$('#hiddendataG').val(x);


$.post("sidebarpage/update-remarks.php",{x:x},function(data,
status){
  var d = JSON.parse(data);
  $('#G_REMARKS').val(d.remarks);

});
$('#setRemarks').modal("show");

 }



function setRemarks(){


  var x = $('#hiddendataG').val();
  var b = $('#G_REMARKS').val();
var hiddendataG = $('#hiddendataG').val();




$.post("sidebarpage/update-remarks.php", {
 x:x ,b:b
},function(data,status){
  var json = JSON.parse(data);
  status = json.status;
  if(status =='success'){

$('#xg').DataTable().ajax.reload();


  }
});

}



</script>
