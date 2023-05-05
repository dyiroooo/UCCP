
        <div class="container my-3 ">
            <h1 class="text-center">ENROLLEE LIST</h1>
            <div class="" id="displayTableEnrollee"></div>
        </div>

        <div  id="empModal" class="modal fade"  role="dialog">
                       <div class="modal-dialog modal-xl modal-dialog-scrollable">
                           <div class="modal-content">
                               <div class="modal-header">
                                   <h4 class="modal-title">Requirements</h4>
                              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                               </div>
                               <div class="modal-body">
                               </div>
                               <div class="modal-footer">
                              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                               </div>
                           </div>
                       </div>
               </div>

<script type="text/javascript">

$(document).ready(function(){

  displayData();
})

function displayData(){

    var display ="true";

    $.ajax({

        url:'table-enrollee.php',
        type: 'post',
        data: {display: display},
        success:function(data,status){
            $('#displayTableEnrollee').html(data);
        }


    })

}

function reject(r){
  alert(r);
      $.ajax({

          url:'remove-enrollee.php',
          type: 'post',
          data: {remove: r},
          success:function(data,status){
            displayData();
          }
      })
}

function accept(id){

  alert(id);
  if(confirm("Are you Sure You Want to Accept This Applicant ?")){

          $.ajax({

              url: 'Accept-enrollee.php' ,
              type: 'post',
              data: {accept: id},
              success:function(data){

                    displayData();
              },



          });



  }
}

function view(x){


  $.ajax({
             url: 'View-Requirements-Enrollment.php',
             type: 'post',
             data: {x: x},
             success: function(response){
                 $('.modal-body').html(response);
                 $('#empModal').modal('show');
             }
         });


}


</script>
