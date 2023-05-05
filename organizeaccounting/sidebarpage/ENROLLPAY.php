<!-- Enrollment Payments -->
<div class="container">
      <div class="row">
          <div class="col-md-12">
              <div class="card">
                <div class="card-header">
                  <center><h1>Enrollment Payments</h1></center>
                </div>
                  <div class="card-body">
                    <div class="container table-responsive">
                      <table class="table table-bordered cell-border table-hover" id = "enrollpaytb">
                          <thead>
                              <tr>
                                <th>Student Name</th>
                                <th>Course</th>
                                <th>Year Level</th>
                                <th>OR Number</th>
                                <th>Total Price</th>  
                                <th>Paid Amount</th>       
                                <th>Balance</th>                           
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
  <div class="modal fade" id="inputpayments" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <form class="" action="#" method="post" id="inputenrollfeeform">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Update Payments</h5>
        </div>
        <div class="modal-body" id="input_paymentcoursefee">

          </form>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
          <button type="button" id="btninputpayment" name="btninputpayment" class="btn btn-primary pull-right">Input</Button>
        </div>
      </div>
    </div>
  </div>

<script>

//Data Table
$(document).ready(function(){

$('#enrollpaytb').DataTable({
  'serverside':true,
  'processing':true,
  'paging':true,
  "columnDefs": [
    {"className": "dt-center", "targets": "_all"},

  ],

  'ajax':{

    'url': 'sidebarpage/table-enrollpay.php',
    'type':'post',

  },
  'fnCreateRow':function(nRow,aData,iDataIndex){
    $(nRow).attr('id',aData[0]);
  },
});
});

  //Modal Popup
  $(document).ready(function(){
  $(document).on('click', '.inputpayfees', function(){
    var inputenroll_id = $(this).attr('data-id');
    $.ajax({
      url: "sidebarpage/payfees.php",
      type: "post",
      data: {inputenroll_id: inputenroll_id},
      success: function(data){
        $("#input_paymentcoursefee").html(data);
        $("#inputpayments").modal('show');
      }
    });
  });

    //Modal Button
    $(document).ready(function(){
      $(document).on('click', '#btninputpayment', function(){

        var id =  $('#ids').val();
        var payfees = $('#payfees').val();
        var balance = $('#balance').val();

        var update = balance - payfees;
        $('#update').val(update);
   
        $.ajax({
          url: "sidebarpage/payfee.php",
          type: "post",
          data: {id:id, payfees:payfees, update:update},
          success: function(data){
            $("#inputpayments").modal("hide");
            var d =  $('#enrollpaytb').DataTable().ajax.reload();
              
                var x = $('#enrollbilltbl').DataTable().ajax.reload();
          }
        });
      });
    });
  });

</script>
