

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
                
                          <input type="text" class="form-control" id="U_course" >
                          <input type="text" class="form-control" id="U_year" >
                          <input type="text" class="form-control" id="U_units" >
                           <input type="text" class="form-control" id="U_sem" >

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

<script type="text/javascript">

$(document).ready(function(){




     var table2= $('#approved').DataTable({
        'serverside':true,
        'processing':false,
        'paging':true,
        "columnDefs": [
         {"className": "dt-center", "targets": "_all"},
          { "width": "50%", "targets": 0 },
          { "width": "40%", "targets": 1 },
          { "width": "10%", "targets": 2 },
      ],

                    'ajax':{

                      'url': 'sidebarpage/Curriculumtabl-Approved.php',
                      'type':'post',

                    },
                    'fnCreateRow':function(nRow,aData,iDataIndex){
                      $(nRow).attr('id',aData[0]);
                    },

               });
               
               
               
               setInterval(function() {
//   // Store the current search value
//   searchValue = $('#example_filter input').val();
  
  // Reload the DataTable
  table2.ajax.reload(null, false);
  
//   // Set the search value back to the input element
//   $('#example_filter input').val(searchValue);
}, 5000);


});


function update_availability(){
 
  var hiddendataA = $('#hiddendataAvailability').val();
  var u_availability= $('#u_availability').val();
      var u_course= $('#U_course').val();
      var u_year= $('#U_year').val();
      var u_units= $('#U_units').val();
       var u_sem= $('#U_sem').val();


  $.post("sidebarpage/update-availability.php", {
hiddendataA:hiddendataA ,u_availability:u_availability,u_course:u_course,u_year:u_year,u_units:u_units,u_sem:u_sem
},function(data,status){

  var jsons = JSON.parse(data);
   status = jsons.status;
//   if(status =='success'){
//          var update=  $('#approved').DataTable().ajax.reload();
//   }

  if (status =='success') {
    var update=  $('#approved').DataTable().ajax.reload();
    alert('Update successful!');

    
} else if (status =='failed') {
    alert(jsons.message);
} else {
    // handle other response here
}

});

}


function setA(update){

  $('#hiddendataAvailability').val(update);
$.post("sidebarpage/update-availability.php",{update:update},function(data,
  status){
    var userid= JSON.parse(data);

    $('#u_availability').val(userid.availability);
     $('#U_course').val(userid.Course);
          $('#U_year').val(userid.Year);
          $('#U_units').val(userid.Units);
         $('#U_sem').val(userid.Sem);

});
 $('#updateModal').modal("show");

   }







</script>
