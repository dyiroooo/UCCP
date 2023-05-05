<!-- Enrollment Billing -->
  <div class="container">
      <div class="row">
          <div class="col-md-12">
              <div class="card">
                <div class="card-header">
                  <center><h1>Enrollment Billing</h1></center>
                </div>
                  <div class="card-body">
                    <div class="container table-responsive">
                      <table class="table table-bordered cell-border table-hover" id = "enrollbilltbl">
                          <thead>
                              <tr>
                                <th>Student Name</th>
                                <th>Course</th>
                                <th>Year Level</th>
                                <th>OR Number</th>
                                <th>Fee Type</th>
                                <th>Amount</th>
                                <th>Total Price</th>       
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
  <div class="modal fade" id="inputenrollcoursefee" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <form class="" action="#" method="post" id="inputenrollfeeform">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Update Course and Fee</h5>
        </div>
        <div class="modal-body" id="input_enrollcoursefee">

          </form>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
          <button type="button" id="inputbtnenroll" name="btninputenroll" class="btn btn-primary pull-right">Input</Button>
        </div>
      </div>
    </div>
  </div>

  <!-- Input Fee Modal End -->
  <div class="modal" id="enbill" role = "dialog">
    <div class="modal-dialog">
      <div class="modal-content">
        <!-- Modal Header -->
        <div class="modal-header">
          <h4 class="modal-title">Enrollment Receipt</h4>
        </div>
        <!-- Modal body -->
        <div class="modal-body" id="ENbillreceipt">

        </div>
        <!-- Modal footer -->
          <div class="modal-footer">
            <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
            <button type="button" class = "btn btn-primary" onclick="printDiv1('print1')">Print</button>
          </div>
        </div>
      </div>
    </div>

          <!--  -->
  <div class="modal fade" id="accepten" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <form class="" action="#" method="post" id="acceptenrollform">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Accept Enrollee</h5>
        </div>
        <div class="modal-body" id="accept_enroll">

          </form>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cancel</button>
          <button type="button" id="acceptenrolleee" class="btn btn-primary pull-right">Accept</Button>
        </div>
      </div>
    </div>
  </div>
<!--  -->

<script>

//Data Table
$(document).ready(function(){

$('#enrollbilltbl').DataTable({
  'serverside':true,
  'processing':true,
  'paging':true,
  "columnDefs": [
    {"className": "dt-center", "targets": "_all"},],

  'ajax':{
    'url': 'sidebarpage/table-enrollbill.php',
    'type':'post',
  },
  'fnCreateRow':function(nRow,aData,iDataIndex){
    $(nRow).attr('id',aData[0]);
  },
});
});

  //Modal Popup
  $(document).ready(function(){

  $(document).on('click', '.inputenrollfees', function(){
    var inputenroll_id = $(this).attr('data-id');
    $.ajax({
      url: "sidebarpage/inputenrollfee.php",
      type: "post",
      data: {inputenroll_id: inputenroll_id},
      success: function(data){
        $("#input_enrollcoursefee").html(data);
        $("#inputenrollcoursefee").modal('show');
        var d = $('#enrollbilltbl').DataTable().ajax.reload();
        var v =  $('#enrollpaytb').DataTable().ajax.reload();

      }
    });
  });

    //Modal Button
    // $(document).ready(function(){
      $(document).on('click', '#inputbtnenroll', function(){

        var id =  $('#ids').val();
        var orenumber_id = $('#orenumber_id').val();
        var price = $('#price').val();
        var totalprice = $('#total').val();

        var feetypes = new Array();
        $.each($("input[name='feetypes[]']:checked",),function() {
          feetypes.push($(this).val());
        });
       feetypes = feetypes.toString();
      
      
        $.ajax({
          url: "sidebarpage/inputenrollprice.php",
          type: "post",
          data: {id:id , orenumber_id:orenumber_id, feetypes:feetypes, price:price, totalprice:totalprice},
          success: function(data){
            $("#inputenrollcoursefee").modal("hide");
             //location.reload();
             var d = $('#enrollbilltbl').DataTable().ajax.reload();
             var v =  $('#enrollpaytb').DataTable().ajax.reload();
     
          }
        });
      });
    // });
  });


    //Enrollment Receipt

  $(document).on('click', '#printenrollbill', function(){
  var ids = $(this).attr('data-id');
  $.ajax({
    url: 'sidebarpage/enrollreceipt.php',
    type: "post",
    data: {ids: ids},
    success: function(data){
      // $('.modal-bodyss').html(response);
      $('#ENbillreceipt').html(data);
      $('#enbill').modal('show');
    }
  });
});

      $(document).on('click', '.acceptenrollee', function(){
          var acceptenroll_id = $(this).attr('id');
          $.ajax({
            url: "sidebarpage/acceptenrolldisp.php",
            type: "post",
            data: {acceptenroll_id: acceptenroll_id},
            success: function(data){
              
              $("#accept_enroll").html(data);
              $("#accepten").modal('show');
            }
          });
          $(document).on('click', '#acceptenrolleee', function(){
            $.ajax({
              url: "sidebarpage/acceptenrollee.php",
              type: "post",
              data: $("#acceptenrollform").serialize(),
              success: function(data){
              

              
                // location.reload();
                var b =  $('#enrollbilltbl').DataTable().ajax.reload();
                var d =  $('#enrollpaytb').DataTable().ajax.reload();
      
                // var m = $('#enrollpaidtbl').DataTable().ajax.reload();
            
                $('#enrollpaidtbl').load('sidebarpage/LISTPAIDENROLLEE.php');
                $("#accepten").modal("hide");
              }
            });
          });
        });
</script>
