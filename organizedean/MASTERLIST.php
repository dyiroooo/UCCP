<?php
include 'include/header.php';
include 'include/config.php';
?>

<div class="d-flex" id="wrapper">
  <?php include 'include/sidebar.php'; ?>
  <div class="" id="page-content-wrapper">
    <nav class="navbar navbar-expand-lg navbar-light bg-transparent py-4 px-4">
      <div class="d-flex align-items-center">
        <i class="fas fa-bars primary-text fs-4 me-3" id="menu-toggle"></i>
        <h2 class="fs-2 m-0">Deans Dashboard</h2>
      </div>
    </nav>
  </div>

  <div class="container py-3">
    <?php
    include ("include/config.php");
    $sql= "SELECT DISTINCT `courseyearsection` FROM `uccp_sched`"; //pwedeng uccp_sec yung ilagay ko di ko alam kung bakit
    $results = mysqli_query($conn,$sql);

    ?>


    <div class="modal fade" id="setremarks" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                <option value="PASSED">PASSED</option>
                <option value="DROP">Drop</option>
                <option value="FAILED">FAILED</option>



              </select>

            </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            <button type="button" class="btn btn-primary"  onclick="setremarks()" data-bs-dismiss="modal">SET REMARKS</button>
            <input type="hidden" id="hiddendataG">
          </div>
        </div>
      </div>
    </div>





    <div class="container py-3">
      <div class="row">
        <div class="col-md-12">
          <div class="card">
            <div class="card-header">
              <h3 align = "center">MASTERLIST</h3>
              <div class="mb-4 text-center mt-4 ">
                <select class="form-control" name="SY" id="masterlist-section">
                  <option value="" class="text-center">SELECT</option>
                  <?php
                  while($r = mysqli_fetch_assoc($results)){
                    echo '<option>'.$r['courseyearsection'].'</option>';
                  }
                  ?>
                </select>

                <div class="card-body">


                  <table id="masterlist" class ="table table-condensed table-bordered table-hover table-responsive" style="width:100%;">
                    <thead>
                      <th class = "text-center">Enrolled Students</th>
                      <th class = "text-center">Section</th>
                      <th class = "text-center">Schoolyear</th>
                      <th class = "text-center">Sem</th>
                      <th class = "text-center">Remarks</th>
                      <th class = "text-center">Operation</th>
                    </thead>

                  </table>
                </div>
                <button  class="btn btn-primary"  value="1" id="btnapproved" >APPROVED</button>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

    <?php include 'include/footer.php'; ?>
    <script type="text/javascript">

    $(document).ready(function(){

      var masterlist = $('#masterlist').DataTable({
        'serverside':true,
        'processing':true,
        'paging':true,
        "columnDefs": [
          {"className": "dt-center", "targets": "_all"}

        ],

        'ajax':{

          'url': 'masterlist-tbl.php',
          'type':'post',

        },
        'fnCreateRow':function(nRow,aData,iDataIndex){
          $(nRow).attr('id',aData[0]);
        },

      });



      $('#masterlist-section').on('change', function () {

        masterlist.search( this.value ).draw();

      } );


      $('input[type="search"]').on( 'keyup', function () {
        var s =($(this).val());


        if(s == ""){
          $('#masterlist-section').val('').change();


        }

      } );


    });

    function addRemarks(update){

      $('#hiddendataG').val(update);
      $.post("updateremarks.php",{update:update},function(data,
        status){
          var x= JSON.parse(data);

          $('#G_REMARKS').val(x.remarks);

        });
        $('#setremarks').modal("show");

      }



      function setremarks(){
        var updateRemarks = $('#G_REMARKS').val();

        var hiddendataG = $('#hiddendataG').val();

        $.post("updateremarks.php", {
          updateRemarks:updateRemarks, hiddendataG:hiddendataG
        },function(data,status){

          var jsons = JSON.parse(data);
          status = jsons.status;
          if(status =='success'){
            var update=  $('#masterlist').DataTable().ajax.reload();
          }
              
        });

      }


      $("#btnapproved").click(function(e) {

        alert($(this).val());
        var x =$('#masterlist-section').val();
        alert(x);
        e.preventDefault();
        $.ajax({
          type: "POST",
          url: "approved.php",
          data: {
            id: $(this).val() ,section:x
          },
          success: function(result) {
            alert("SENT SUCCESSFULLY")

          },
          error: function(result) {
            alert('error');
          }
        });
      });

      </script>

    </div>
