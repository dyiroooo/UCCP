
  <!-- Admission Billing -->
  <div class="container">
      <div class="row">
          <div class="col-md-12">
              <div class="card ">
                <div class="card-header">
                  <center><h1>Admission Billing</h1></center>
                </div>
                  <div class="card-body">
                    <div class="container table-responsive">
                      <table class="table table-bordered cell-border table-hover" id ="adbilltbl">
                          <thead>
                              <tr>
                                <th>Student Name</th>
                                <th>Type of Bill</th>
                                <th>Price</th>
                                <th>OR Number</th>
                                <th class="text-center">Action</th>
                              </tr>
                          </thead>
                      </table>
                    </div>
                  </div>
              </div>
          </div>
      </div>
  </div>

  <!-- Input Fee Modal Start-->
  <div class="modal fade" id="inputcoursefee" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <form class="" action="#" method="post" id="inputfeeform">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Manage Fee</h5>
        </div>
        <div class="modal-body" id="input_coursefee">

          </form>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
          <button type="button" id="inputbtn" name="btninput" class="btn btn-primary pull-right">Input</Button>
        </div>
      </div>
    </div>
  </div>
  <!-- Input Fee Modal End -->

  <!-- Modal ng print -->
  <div class="modal" id="addbill">
    <div class="modal-dialog">
      <div class="modal-content">
        <!-- Modal Header -->
        <div class="modal-header">
          <h4 class="modal-title">Admission Receipt</h4>
        </div>
        <!-- Modal body -->
        <div class="modal-bodys" id="ADbillreceipt">

        </div>

        <!-- Modal footer -->
        <div class="modal-footer">
          <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
          <button type="button" class = "btn btn-primary" onclick="printDiv('print')" data-bs-dismiss="modal">Print</button>
        </div>
        </div>
      </div>
    </div>

      <!--  -->
  <div class="modal fade" id="acceptapl" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <form class="" action="#" method="post" id="acceptappform">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Accept Applicant</h5>
        </div>
        <div class="modal-body" id="accept_applicant">

          </form>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cancel</button>
          <button type="button" id="acceptapplicant" class="btn btn-primary pull-right">Accept</Button>
        </div>
      </div>
    </div>
  </div>
<!--  -->

    <script>
$(document).ready(function(){

$('#adbilltbl').DataTable({
  'serverside':true,
  'processing':true,
  'paging':true,
  "columnDefs": [
    {"className": "dt-center", "targets": "_all"},

  ],

  'ajax':{

    'url': 'sidebarpage/table-admission.php',
    'type':'post',

  },
  'fnCreateRow':function(nRow,aData,iDataIndex){
    $(nRow).attr('id',aData[0]);
  },
});
});


    //update view
    $(document).on('click', '.inputfees', function(){
      var input_id = $(this).attr('data-id');
      $.ajax({
        url: "sidebarpage/inputadmissionfee.php",
        type: "post",
        data: {input_id: input_id },
        success: function(data){
          $("#input_coursefee").html(data);
          $("#inputcoursefee").modal('show');
        }
      });

      //update button
      $(document).on('click', '#inputbtn', function(){
        var type = $('#course_id').val();
        var price = $('#price').val();
        var data = $('#input_id').val();
        var ornumber_id = $('#ornumber_id').val();

        $.ajax({
          url: "sidebarpage/inputfees.php",
          type: "post",
          data: {type: type ,data:data ,price:price, ornumber_id:ornumber_id},
          success: function(data){
            $("#inputcoursefee").modal("hide");
            var d =  $('#adbilltbl').DataTable().ajax.reload();
            //location.reload();
          }
        });
      });
    });

    $(document).ready(function(){
      //Print Admission Receipt
      $(document).on('click', '#adbills', function(){
    var adid = $(this).attr('data-id');
   alert (adid);
  $.ajax({
    url: 'sidebarpage/admissionreceipt.php',
    type: "post",
    data: {adid: adid},
    success: function(data){
      // $('.modal-bodyss').html(response);
      $('#ADbillreceipt').html(data);
      $('#addbill').modal('show');
    }
  });
});
});



// function TRIAL(id){
//     var trial = id;
//     alert(trial);
//     $.ajax({
//       url: 'sidebarpage/admissionreceipt.php',
//       type: 'post',
//       data: {trial:trial},
//       success: function(data){
//         $('#ADbillreceipt').html(data);
//       $('#addbill').modal('show');
//       }
//     })
// }

      
      $(document).on('click', '.acceptapplicant', function(){
          var accept_id = $(this).attr('id');
          $.ajax({
            url: "sidebarpage/acceptdisp.php",
            type: "post",
            data: {accept_id: accept_id},
            success: function(data){
              $("#accept_applicant").html(data);
              $("#acceptapl").modal('show');
            }
          });
          $(document).on('click', '#acceptapplicant', function(){
            $.ajax({
              url: "sidebarpage/acceptapplicant.php",
              type: "post",
              data: $("#acceptappform").serialize(),
              success: function(data){
                $("#acceptapl").modal("hide");
                // location.reload();
                var b =  $('#adbilltbl').DataTable().ajax.reload();
                
                $('#enrollpaidtbl').load('sidebarpage/LISTPAIDAPPLICANTS.php');
              }
            });
          });
        });

    </script>
