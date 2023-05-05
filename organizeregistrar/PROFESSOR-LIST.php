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

  <div class="container py-3 ">
    <div class="row">
      <div class="col-md-12">
        <div class="container">
        <div class="card">
          <div class="card-header">
            <h1 align = "center">LIST OF PROFESSORS</h1>
          </div>
          <div class="card-body">

            <table id="profs" class="table text-center cell-border table-hover" style="width:100%">
              <thead>
                <tr align = "center">
                  <th class="text-center">Professor Details</th>
                  <th class="text-center">Faculty</th>
                  <th class="text-center">Operation</th>
                </tr>
              </thead>
            </table>
          </div>
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

    $('#profs').DataTable({
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

        'url': 'profstbl.php',
        'type':'post',

      },
      'fnCreateRow':function(nRow,aData,iDataIndex){
        $(nRow).attr('id',aData[0]);
      },

    });
  });

  function removeProf(r){
    $.ajax({

      url:'deleteprof.php',
      type: 'post',
      data: {x: r},
      success:function(data,status){

        var json = JSON.parse(data);
        status = json.status;
        if(status =='success'){

          $('#profs').DataTable().ajax.reload();


        }
      }
    })
  }


  </script>
