<?php
include 'include/header.php';
include 'include/config.php';
?>
<!-- Modal -->
  <div class="modal fade" id="AddSections" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">CURRICULUM</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body" id="body">
            <!-- <div class="mb-3">

                             <label for="Courses" class="form-label">COURSE</label>
                             <select class="form-control"  id="e">
                                 <option value="" disabled selected>Select Course</option>

                               <?php
                                //  include ("../include/config.php");
                                //  $sql = "SELECT DISTINCT courseyearsection FROM `uccp_section`";
                                //  $result = mysqli_query($conn,$sql);

                                //    while($r = mysqli_fetch_assoc($result)){
                                //      echo '<option>'.$r['courseyearsection'].'</option>';
                                //    } -->

                                  ?>
                             </select>
            </div> -->
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
          <button type="button" class="btn btn-primary"  data-bs-dismiss="modal" onclick="addS()">ADD</button>
        </div>
      </div>
    </div>
  </div>

  <?php include 'include/sidebar.php'; ?>
<div id="page-content-wrapper">
  <nav class="navbar navbar-expand-lg navbar-light bg-transparent py-4 px-4">
    <div class="d-flex align-items-center">
      <i class="fas fa-bars primary-text fs-4 me-3" id="menu-toggle"></i>
      <h2 class="fs-2 m-0">Dashboard</h2>
    </div>
  </nav>

 <div class="container my-3 ">
    <div class="row">
          <div class="col-md-12">
              <div class="card">
                <div class="card-header">
                  <h1 align = "center">ENROLLED STUDENT LIST</h1>
                </div>
                <div class="card-body">

      <!-- Button trigger modal --> 
      <button type="button" class="btn btn-primary col-sm-2 mb-3" data-bs-toggle="modal" id="adds" data-bs-target="#AddSections">
       <i class="fa fa-plus"></i>
      </button>
                <table id="sectionlist" class ="table table-condensed table-bordered table-hover table-responsive" style="width:100%;">
                  <thead>
                    <th><input type = "checkbox" id ="checkAll"></th>
                    <th class = "text-center">Enrolled Students</th>
                    <th class = "text-center">Course</th>
                    <th class = "text-center">Year</th>
                    <th class = "text-center">Section</th>
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


    $('#adds').click(function(){
                   
                    $.ajax({
                        url: 'dropdown.php',
                        type: 'post',
                        data: {},
                        success: function(response){ 
                            $('#body').html(response); 
                            $('#AddSections').modal('show'); 
                        }
                    });
                });



 $('#sectionlist').DataTable({
   'serverside':true,
   'processing':true,
   'paging':true,
   "columnDefs": [
    {"className": "dt-center", "targets": "_all"}

 ],

               'ajax':{

                 'url': 'sectionlist-tbl.php',
                 'type':'post',

               },
               'fnCreateRow':function(nRow,aData,iDataIndex){
                 $(nRow).attr('id',aData[0]);
               },

          });




 $("#checkAll").click(function(){


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

})

 });

function addS(){

    var x =$('#e').val();
    var values = $("input:checkbox:checked").map(function()
{
return $(this).val();
}).get();
    // $("input[name='selector[]'")
    //           .map(function(){return $(this).val();}).get();





    if(x == "")
    {
      alert("Please fill out missing fields");
      $('#e').val('');
      return false;
    }

    $.ajax({

        url:'update-enrolledstudentSection.php',
        type: 'post',
        data: {x:x, values:values},
        success:function(data,status){
        
          var jsons = JSON.parse(data);
          status = jsons.status;
          

          if(status =='success'){

          var c=  $('#sectionlist').DataTable().ajax.reload();
           var x=  $('#masterlist').DataTable().ajax.reload();
          }
              $('#e').val('');
                $('#checkAll').prop('checked', false);
              $('.checkOne').attr('checked', false);




        }
    })




}



  </script>

