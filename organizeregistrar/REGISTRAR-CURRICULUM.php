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
            <h3 align = "center">LIST OF CURRICULUM</h3>
          </div>

          <div class="card-body">

            <div class="table-responsive">
              <table class="table text-center  cell-border table-hover" id="Curriculum" style="width:100%;">
                <thead>
                  <tr >
                    <th class="text-center">SchooYear</th>
                    <th class="text-center">Course Details</th>
                    <th class="text-center">Subject Details</th>
                         <th class="text-center">Sem</th>
                    <th class="text-center">Units</th>
                    <th class="text-center">Status</th>
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
  </div>

  <?php
  include 'include/footer.php';
  ?>

  <script type="text/javascript">

  $(document).ready(function(){




  var table=  $('#Curriculum').DataTable({
      'serverside':true,
      'processing':false,
      'paging':true,
      "columnDefs": [
        {"className": "dt-center", "targets": "_all"},

      ],

      'ajax':{

        'url': 'Registrar-Curriculumtable.php',
        'type':'post',

      },
      'fnCreateRow':function(nRow,aData,iDataIndex){
        $(nRow).attr('id',aData[0]);
      },




    });
    
    // var searchValue = '';

    setInterval(function() {
          // Store the current search value
          searchValue = $('#example_filter input').val();
          
          // Reload the DataTable
          table.ajax.reload(null, false);
          
          // Set the search value back to the input element
          $('#example_filter input').val(searchValue);
        }, 5000);
        
        
   

    // DisplayCurriculumR();


    // $('#search').on("keyup",function(){
    //       var search = $(this).val();
    //
    //     $.ajax({
    //         url:"live-search.php",
    //         type: "POST",
    //         data: {search:search},
    //         success: function(data){
    //           $("#CurriculumtableR").html(data);
    //         }
    //
    //     });
    //
    //
    // });


  });


  //   function DisplayCurriculumR(){
  //
  //     var display ="true";
  //
  //     $.ajax({
  //
  //         url:'Registrar-Curriculumtable.php',
  //         type: 'post',
  //         data: {display: display},
  //         success:function(data,status){
  //             $('#CurriculumtableR').html(data);
  //         }
  //     });
  //
  // }



  function RejectR(r){
    if(confirm('Are you sure you want to Reject This CURRICULUM SUBJECT?')){
      $.ajax({
        url:'reject-curriculum.php',
        type: 'post',
        data: {removeR: r},
        success:function(data,status){

          var json = JSON.parse(data);
          status = json.status;
          if(status =='success'){

            var reject=  $('#Curriculum').DataTable().ajax.reload();

          }
          // DisplayCurriculumR();
        }
      })
    }
  }


  function AcceptR(a){
    if(confirm('Are you sure you want to Reject This CURRICULUM SUBJECT?')){
      $.ajax({
        url:'accept-curriculum.php',
        type: 'post',
        data: {acceptR: a},
        success:function(data,status){

          var json = JSON.parse(data);
          status = json.status;
          if(status =='success'){

            var accept =  $('#Curriculum').DataTable().ajax.reload();

          }
          // DisplayCurriculumR();
        }
      })
    }
  }
  </script>
