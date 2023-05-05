<?php
include 'include/header.php';
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
            <button type="button" class="btn btn-primary mb-2" data-bs-toggle="modal" data-bs-target="#exampleModal" id="AddExamBatch">
              <i class="fa-solid fa-plus"></i> Add Exam Batch
            </button>
            <button type="button" class="btn btn-info mb-2" data-bs-toggle="modal" data-bs-target="#assignModal" id="AssignBatch">
              <i class="fa-solid fa-plus"></i> Assign Batch
            </button>
            <div class="row">
              <div class="col">
                <div class="card mb-3">
                  <div class="card-header">
                    <h1 align = "center">List of Examinees</h1>
                    <div class="mb-2 mt-4 text-center ">
                    </div>
                  </div>
                  <div class="card-body form-control">
                    <?php
                    include ("include/config.php");

                    $sql= "SELECT * FROM `uccp_examinees`";
                    $result = mysqli_query($conn,$sql);
                    ?>
                    <div class="table-responsive">
                      <table class="table text-center table-striped table-hover" id="exam">
                        <thead>
                          <tr align = "center">
                            <th class="text-center"><input type="checkbox" id="checkAll"></th>
                            <th class="text-center" >Examinee Details</th>
                            <th class="text-center" >Contacts</th>
                            <th class="text-center">Operation</th>
                          </tr>
                        </thead>

                      </table>
                    </div>
                  </div>
                </div>
              </div>
              <!-- 2nd Table -->

              <div class="col">
                <div class="card mb-3">
                  <div class="card-header">
                    <h1 align = "center">List of Examinees with Assigned Batches</h1>
                    <!-- Exam Sched = ES -->
                    <select class="form-control" id="ESdropdown" name="">
                      <?php
                      include 'include/config.php';

                      //this query determines the Opened Schoolyear
                      $existingsy = "SELECT * FROM uccp_admission_schedule WHERE status = 'Open' ";
                      $resultsy = mysqli_query($conn, $existingsy);

                      while ($r = mysqli_fetch_array($resultsy)) {
                        $year = $r['schoolyear'];
                        // this query fetch the opened school year's exam batches
                        $sql = "SELECT * FROM uccp_examsched WHERE syexisting = '$year' ORDER BY id DESC ";
                        $results = mysqli_query($conn, $sql);

                        if (mysqli_num_rows($results)>0) {
                          while ($row = mysqli_fetch_assoc($results)) {
                            $examschedid = $row['id'];
                            $batch = $row['batch'];
                            $category = $row['category'];
                            ?>
                            <optgroup id="optgroupBatch" label="Schoolyear: <?=$row['syexisting']?> -  Batch: <?= $batch ?> ">
                              <option id="optCategory" value="<?=$category?>">Category: <?= $category ?></option>
                            </optgroup>
                            <?php
                          }
                        }
                        }

                      ?>
                    </select>
                    <div class="mb-2 mt-4 text-center ">
                    </div>
                  </div>
                  <div class="card-body form-control">
                    <?php
                    include ("include/config.php");

                    $sql= "SELECT * FROM `uccp_examinees`";
                    $result = mysqli_query($conn,$sql);
                    ?>
                    <div class="table-responsive">
                      <table class="table text-center table-striped table-hover" id="examassigned">
                        <thead>
                          <tr align = "center">
                            <th class="text-center"><input type="checkbox" id="checkAllpt2"></th>
                            <th class="text-center" >Examinee Details</th>
                            <th class="text-center" >Operation</th>
                          </tr>
                        </thead>

                      </table>
                      <button type="button" class="btn btn-info m-2" id="emailAll">
                        <i class="fa-regular fa-envelope"></i> Email All
                      </button>
                    </div>
                  </div>
                </div>
              </div>
              <!-- 3rd Table -->
              <div class="col">
                <div class="card">
                  <div class="card-header">
                    <h1 align = "center">Existing Batch</h1>
                  </div>
                  <div class="card-body form-control">
                    <?php
                    include ("include/config.php");
                    //schoolyear admission query
                    $syquery = "SELECT schoolyear FROM uccp_admission_schedule WHERE status = 'Open' ";
                    $syqueryresult = mysqli_query($conn, $syquery);

                    //schoolyear batch details query
                    $sql= "SELECT * FROM `uccp_examsched` ORDER BY id DESC";
                    $result = mysqli_query($conn,$sql);
                    ?>
                    <div class="table-responsive">
                      <table class="table text-center table-bordered table-hover" id="batch">
                        <thead>
                          <tr align = "center">
                            <th class="text-center">Batch Details</th>
                            <th class="text-center">Operations</th>
                          </tr>
                        </thead>


                      </table>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
<!-- </div> -->

<!-- Create Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <?php
        $syquery = "SELECT schoolyear FROM uccp_admission_schedule WHERE status = 'Open' ";
        $syqueryresult = mysqli_query($conn, $syquery);

        if (mysqli_num_rows($syqueryresult)>0){
          while ($syrow=mysqli_fetch_array($syqueryresult)) {
            ?>
            <h5 class="modal-title" id="exampleModalLabel">Create Exam Batch <?= $syrow['schoolyear']  ?></h5>
            <input type="text" hidden id="txtexistingsy" name="" value="<?= $syrow['schoolyear'] ?>"></input>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
            <div class="mb-3">
              <label for="" class="form-label"><b>Batch</b></label>
              <input type="number" class="form-control" id="txtbatch"  placeholder="">

              <label for="" class="form-label"><b>Category</b></label>
              <input type="text" class="form-control" id="txtcategory"  placeholder="">

              <label for="" class="form-label"><b>GWA</b></label>
              <input type="int" class="form-control" id="txtgwa"  placeholder="">

              <label for="" class="form-label"><b>Schedule</b></label>
              <input type="date" class="form-control" id="txtschedule"  placeholder="">

              <label for="" class="form-label"><b>Room</b></label>
              <input type="text" class="form-control" id="txtroom"  placeholder="">

              <label for="" class="form-label"><b>Size</b></label>
              <input type="number" class="form-control" id="txtsize"  placeholder="">

            </div>

          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            <button type="button" class="btn btn-primary"  data-bs-dismiss="modal" onclick="Add()">Create Batch</button>
          </div>
          <?php
        }
      }
      ?>
    </div>
  </div>
</div>

<!-- Assign Modal -->
<div class="modal fade" id="assignModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Assign Batch</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body" id="assignBody">
        <div class="mb-3">
          <!-- School Year -->
          <label class="form-label"><b>School Year</b></label>
          <select class="schoolyear form-control" id="schoolyear" name="schoolyear">
            <option selected="selected" disabled selected>Select School Year</option>
            <?php
            $sql = "SELECT * FROM uccp_admission_schedule WHERE status = 'Open' ";
            $sqlresult = mysqli_query($conn, $sql);
            while($row123 = mysqli_fetch_assoc($sqlresult)): ?>
            <option value="<?= $row123['schoolyear'] ?>"><?= $row123['schoolyear']?></option>
          <?php endwhile; ?>
        </select>

        <br>
        <!-- Batch -->
        <label for="Courses" class="form-label"><b>Batch</b></label>
        <select class="batch form-control" id="batch" name="batch">
          <option selected="selected" disabled selected>Select Batch</option>
        </select>
        <br>
        <!-- Category -->
        <label for="Courses" class="form-label"><b>Category</b></label>
        <select class="category form-control" id="category" name="category">
          <option selected="selected" disabled selected>Select Category</option>
        </select>
        <br>
        <!-- GWA Range -->
        <label for="Courses" class="form-label"><b>GWA</b></label> <br>
        <select class="gwa form-control" id="gwa" name="gwa">
          <option selected="selected" disabled selected>Select GWA Range</option>
        </select>
        <br>
        <!-- Schedule -->
        <label for="Courses" class="form-label"><b>Schedule</b></label>
        <select class="schedule form-control" id="schedule" name="schedule">
          <option selected="selected" disabled selected>Select Schedule</option>
        </select>
        <br>
        <!-- Room -->
        <label for="Courses" class="form-label"><b>Room</b></label>
        <select class="room form-control" id="room" name="room">
          <option selected="selected" disabled selected>Select Room</option>
        </select>
        <!-- Size -->
        <label for="Courses" class="form-label"><b>Size</b></label>
        <select class="sized form-control" id="sized" name="sized">
          <option selected="selected" disabled selected>Select Size</option>
        </select>

      </div>
    </div>
    <div class="modal-footer">
      <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
      <button type="button" class="btn btn-primary"  data-bs-dismiss="modal" onclick="btnAssign()">Assign</button>
    </div>
  </div>
</div>
</div>

<!-- Edit Batch Modal -->
<div class="modal fade" id="editBatch" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <form action="" id="editBatchform">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Edit Exam Batch</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body" id="editBatchbody">
        </form>

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary" id="editBatchbtn" data-bs-dismiss="modal" onclick="">Update Batch</button>
      </div>
    </div>
  </div>
</div>


<?php
include 'include/footer.php';
?>

<script type="text/javascript">

$(document).ready(function(){

  $('#batch').DataTable({
    'serverside':true,
    'processing':true,
    'paging':true,
    "columnDefs": [
      {"className": "dt-center", "targets": "_all"},

    ],

    'ajax':{

      'url': 'table-batch.php',
      'type':'post',

    },
    'fnCreateRow':function(nRow,aData,iDataIndex){
      $(nRow).attr('id',aData[0]);
    },
  });
});
  $.ajax({
        type: 'POST',
        url: 'check_status.php',
        success: function(data) {
            if(data == 0) {
                $('#AddExamBatch').prop('disabled', true);
                
                $('#AssignBatch').prop('disabled', true);

            } else {
                $('#AddExamBatch').prop('disabled', false);
              
                $('#AssignBatch').prop('disabled', false);
            }
        }
    });

$(document).ready(function(){
  $('#exam').DataTable({
    'serverside':true,
    'processing':true,
    'paging':true,
    "columnDefs": [
      {"className": "dt-center", "targets": "_all"},

    ],

    'ajax':{

      'url': 'table-exam.php',
      'type':'post',

    },
    'fnCreateRow':function(nRow,aData,iDataIndex){
      $(nRow).attr('id',aData[0]);
    },
  });
});

$(document).ready(function(){
  $('#examassigned').DataTable({
    'serverside':true,
    'processing':true,
    'paging':true,
    "columnDefs": [
      {"className": "dt-center", "targets": "_all"},

    ],

    'ajax':{

      'url': 'table-examinees-assigned.php',
      'type':'post',

    },
    'fnCreateRow':function(nRow,aData,iDataIndex){
      $(nRow).attr('id',aData[0]);
    },
  });
});

function Add(){

  var batchno = $('#txtbatch').val();
  var category = $('#txtcategory').val();
  var gwarange = $('#txtgwa').val();
  var sched = $('#txtschedule').val();
  var room = $('#txtroom').val();
  var exsy = $('#txtexistingsy').val();
  var size = $('#txtsize').val();


  $.ajax({
    url:'x.php',
    type: 'post',
    data: {batchno:batchno , category:category, gwarange:gwarange, sched:sched, room:room, exsy:exsy, size:size },
    success:function(data,status){

      var json = JSON.parse(data);
      status = json.status;
      if(status =='success'){
        var d = $('#batch').DataTable().ajax.reload();

      }

      $('#txtbatch').val('');
      $('#txtcategory').val('');
      $('#txtgwa').val('');
      $('#txtschedule').val('');
      $('#txtroom').val('');
      $('#txtexistingsy').val('');
      $('#txtsize').val('');
    }
  })

}

//update view
$(document).on('click', '#yow', function(){
  var batchid = $(this).attr('data-id');
  $.ajax({
    url: "examEditBatch.php",
    type: "post",
    data: {batchid: batchid},
    success: function(data){
      $("#editBatchbody").html(data);
      $("#editBatch").modal('show');
    }
  });
  //update button
  $(document).on('click', '#editBatchbtn', function(){

    var id = $('#editID').val();
    var batch = $('#editBatchNo').val();
    var category = $('#editCategory').val();
    var gwa = $('#editGWA').val();
    var sched = $('#editSched').val();
    var room = $('#editRoom').val();
    var size = $('#editSize').val();
    // var ESid = $('#editID').val();
    // alert(ESid);

    $.ajax({
      url: "examEditBatchquery.php",
      type: "post",
      data: {id:id, batch:batch, category:category, gwa:gwa, sched:sched, room:room, size:size},
      success: function(data){
        $("#editBatch").modal("hide");
        var d =  $('#batch').DataTable().ajax.reload();
        var f =  $('#exam').DataTable().ajax.reload();
      }
    });
  });

});

function reject(id){

  if(confirm('Are you sure you wantt to Reject This Applicant?')){

    $.ajax({
      url:'registrar-examinee-reject.php',
      type:'post',
      data:{reject1:id},
      success:function(data){
        $('#row'+id).hide('slow');
                var d = $('#exam').DataTable().ajax.reload();
      }
    });
  }
}

function accept(id){
  if(confirm("Are you Sure You Want to Accept This Applicant ?")){
    // alert(id);
    $.ajax({
      url: 'registrar-examinee-accept.php',
      type: 'post',
      data: {accept1: id},
      success:function(data){
        $('#row'+id).hide('slow');
        var load = $('#examassigned').DataTable().ajax.reload();
      },
    });
  }
}

function email(id){
  // if(confirm(" ?")){
  // alert(id);
  $.ajax({
    url: 'registrar-examinee-email.php',
    type: 'post',
    data: {email1: id},
    success:function(data){
      // $('#row'+id).hide('slow');
    },
  });
  // }
}

$("#checkAll").click(function(){
  if($(this).is(":checked")){
    $(".origcheckOne").prop('checked',true);
    // $("#adds").prop('disabled',false);
  } else{
    $(".checkOne").prop('checked',false);
    // $("#adds").prop('disabled',true);
  }
});

$(".origcheckOne").click(function(){
  if($(this).is(":checked")){
    // $("#adds").prop('disabled',false);
  }else {
    // $("#adds").prop('disabled',true);
  }
});

// $(document).ready(function(){

$("#checkAllpt2").click(function(){
  if($(this).is(":checked")){
    $(".checkOne").prop('checked',true);
    // $("#adds").prop('disabled',false);
  } else{
    $(".checkOne").prop('checked',false);
    // $("#adds").prop('disabled',true);
  }
});

$(".checkOne").click(function(){
  if($(this).is(":checked")){
    // $("#adds").prop('disabled',false);
  }else {
    // $("#adds").prop('disabled',true);
  }
});

function btnAssign(id) {
  var assignid1 = $('#assignid').val();
  var syexisting1 = $('.schoolyear :selected').text();
  var batch1 = $('.batch :selected').text();
  var category1 = $('.category :selected').text();
  var gwa1 = $('.gwa :selected').text();
  var sched1 = $('.schedule :selected').text();
  var room1 = $('.room :selected').text();
  var size1 = $('.sized :selected').text();
  // var sss = $('#assignid').val();
  // alert (sss);
  // alert(assignid1);

  var values = $(".origcheckOne:checkbox:checked").map(function()
  {
    return $(this).val();
  }).get();

  $.ajax({
    url: 'examineeBatchUpdate.php',
    type: "post",
    data: {assignid1:assignid1, syexisting1:syexisting1, batch1:batch1, category1:category1, gwa1:gwa1, sched1:sched1, room1:room1, size1:size1, values:values },
    success:function(data, status) {
      alert('Assigning Batch Success!');
      var jsons = JSON.parse(data);
      status = jsons.status;
      if (status == 'success'){
        var c = $('#exam').DataTable().ajax.reload();
        var d = $('#examassigned').DataTable().ajax.reload();
      }
      $('.schoolyear').val('');
      $('.batch').val('');
      $('.category').val('');
      $('.gwa').val('');
      $('.schedule').val('');
      $('.room').val('');
      $('.sized').val('');
      $('#checkAllpt2').prop('checked', false);
      $('.checkOne').attr('checked', false);
    }
  });

}

$('#schoolyear').on('change', function(){
  var syid = this.value;
  // console.log(syid);
  $.ajax({
    url: "examBatch.php",
    type: "post",
    data: {syid:syid},
    success:function(result){
      $(".batch").html(result);
      // console.log(result);

    }
  });
});

$('.batch').on('change', function(){
  var batchid = this.value;
  // console.log (batchid);
  $.ajax({
    url: "examCategory.php",
    type: "post",
    data: {batchid:batchid,},
    success:function(data){
      $('.category').html(data);
      // console.log(batchid);
    }
  });
});

$('.category').on('change', function(){
  var categoryid = this.value;
  // console.log (batchid);
  $.ajax({
    url: "examGWA.php",
    type: "post",
    data: {categoryid:categoryid},
    success:function(data){
      $('.gwa').html(data);
      // console.log(categoryid);
    }
  });
});

$('.gwa').on('change', function(){
  var gwaid = this.value;
  // console.log (batchid);
  $.ajax({
    url: "examSchedule.php",
    type: "post",
    data: {gwaid:gwaid},
    success:function(data){
      $('.schedule').html(data);
      // console.log(gwaid);
    }
  });
});

$('.schedule').on('change', function(){
  var roomid = this.value;
  // console.log (batchid);
  $.ajax({
    url: "examRoom.php",
    type: "post",
    data: {roomid:roomid},
    success:function(data){
      $('.room').html(data);
      // console.log(roomid);
    }
  });
});

$('.room').on('change', function(){
  var sizeid = this.value;
  $.ajax({
    url: "examSize.php",
    type: "post",
    data: {sizeid:sizeid},
    success:function(data){
      $('.sized').html(data);
      // console.log(sizeid);
    }
  });
});

$( document ).ready(function() {

  $("#emailAll").prop("disabled",true);
  var table =  $('#examassigned').DataTable();

  // /experiment ni gelo at gumana
  $('input[type="search"]').on( 'keyup', function () {
    var s =($(this).val());

    if(s == ""){
      $('#ESdropdown').val('').change();

    }
  } );

  // table.column( 1 ).visible( false );
  // table.column( 0 ).visible( false );

  $('#ESdropdown').on('change', function () {

    var sy = $(this).val();
    if(sy==""){
      $("#emailAll").prop("disabled",true);
    }else {
      $("#emailAll").prop("disabled",false);
    }
    table.search(this.value).draw();


  });

});

$("#emailAll").click(function(e) {
  var x = $('#ESdropdown').val();

  e.preventDefault();
  $.ajax({
    type: "POST",
    url: "Send-Bulk-Email-Examinee.php",
    data: {
      id: $(this).val(),category:x
    },
    beforeSend:function(){
      $('#emailAll').html('Sending...');
      $('#emailAll').addClass('btn-danger');},
      success: function(result) {
        alert("SENT SUCCESSFULLY")
        $('#emailAll').removeClass('btn-danger');
        $('#emailAll').text('Email ALL');
      },
      error: function(result) {
        alert('error');
      }
    });
  });

  function ESdropdown(){
    var s = document.getElementById("ESdropdown").value;
    $.ajax({
      url: "show-registrar-examinees.php",
      type: "post",
      data: {sy:s},
      success:function(data){
        $('#display').html(data);
      }
    });
  }





</script>
