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



              <label for="" class="form-label mt-2">Availability</label>
              <select class="form-control" name="" id="u_availability">

                <option value="">Select</option>
                <option value="Accredit">Accredit</option>
                <option value="Clear">Clear</option>


              </select>

            </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            <button type="button" class="btn btn-primary"  onclick="update_availability()" data-bs-dismiss="modal">Update</button>
            <input type="hidden" id="hiddendataAvailability">
          </div>
        </div>
      </div>
    </div>



    <div class="container my-3 ">
      <div class="row">
        <div class="col-md-12">
          <div class="card">
            <div class="card-header">
              <h1 align = "center">LIST OF CURRICULUM</h1>
            </div>
            <div class="card-body">
              <!-- <div class="" id="CurriculumtableL"></div> -->

              <table id="approved" class="table text-center  cell-border table-hover" style="width:100%">
                <thead>
                  <tr align = "center">
                    <th class="text-center">SchooYear</th>
                    <th class="text-center">Course Details</th>
                    <th class="text-center">Subject Details</th>
                    <th class="text-center">Sem</th>
                    <th class="text-center">Units</th>
                    <th class="text-center">Status</th>
                    <th class="text-center">Availability</th>
                    <th class="text-center">Operation</th>
                  </tr>
                </thead>
              </table>
            </div>
          </div>
        </div>
      </div>
    </div>

    <?php
    include 'include/footer.php';
    ?>

    <script type="text/javascript">

    $(document).ready(function(){




      $('#approved').DataTable({
        'serverside':true,
        'processing':true,
        'paging':true,
        "columnDefs": [
          {"className": "dt-center", "targets": "_all"},
          { "width": "50%", "targets": 0 },
          { "width": "40%", "targets": 1 },
          { "width": "10%", "targets": 2 },
        ],

        'ajax':{

          'url': 'Curriculumtabl-Approved.php',
          'type':'post',

        },
        'fnCreateRow':function(nRow,aData,iDataIndex){
          $(nRow).attr('id',aData[0]);
        },

      });

    });


    function update_availability(){

      var hiddendataA = $('#hiddendataAvailability').val();
      var u_availability= $('#u_availability').val();

      $.post("update-availability.php", {
        hiddendataA:hiddendataA ,u_availability:u_availability,
      },function(data,status){

        var jsons = JSON.parse(data);
        status = jsons.status;
        if(status =='success'){
          var update=  $('#approved').DataTable().ajax.reload();
        }

      });

    }


    function setA(update){

      $('#hiddendataAvailability').val(update);
      $.post("update-availability.php",{update:update},function(data,
        status){
          var userid= JSON.parse(data);

          $('#u_availability').val(userid.availability);

        });
        $('#updateModal').modal("show");

      }

      </script>

    </div>
