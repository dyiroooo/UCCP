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

  <?php
  ini_set('display_errors', 1);
  include ("include/config.php");
  $q = "SELECT  DISTINCT schoolyear  FROM `uccp_eval` ";
  $results = mysqli_query($conn,$q);

  ?>


  <div class="container py-3">
    <div class="row">
      <div class="col-md-12">
        <div class="container">
        <div class="card">
          <div class="card-header">
            <h3 align = "center">MASTERLIST</h3>

            <div class="mb-4 text-center mt-4 ">
              <select class="form-control" name="SY" id="sy_eval" >
                <option value="">Select</option>
                <?php
                while($r = mysqli_fetch_assoc($results)){
                  echo '<option>'.$r['schoolyear'].'</option>';;
                }
                ?>
              </select>
            </div>

            <div class="card-body">

              <table id="evaluation" class ="table table-condensed table-bordered table-hover table-responsive" style="width:100%;">
                <thead>
                  <th class = "text-center">Enrolled Students</th>
                  <th class = "text-center">Schoolyear</th>
                  <th class = "text-center">Sem</th>
                  <th class = "text-center">Section</th>
                  <th class = "text-center">Remarks</th>

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

<?php
include 'include/footer.php';
?>

<script type="text/javascript">

$(document).ready(function(){

  var e= $('#evaluation').DataTable({
    'serverside':true,
    'processing':true,
    'paging':true,
    "columnDefs": [
      {"className": "dt-center", "targets": "_all"}

    ],

    'ajax':{

      'url': 'eval-tbl.php',
      'type':'post',

    },
    'fnCreateRow':function(nRow,aData,iDataIndex){
      $(nRow).attr('id',aData[0]);
    },

  });


  //  e.column( 1 ).visible( false );

  $('#sy_eval').on('change', function () {

    e.search( this.value ).draw();

  } );


  $('input[type="search"]').on( 'keyup', function () {
    var s =($(this).val());


    if(s == ""){
      $('#sy_eval').val('').change();


    }

  } );


});

</script>
