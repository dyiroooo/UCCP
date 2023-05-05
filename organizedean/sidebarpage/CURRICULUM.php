<!-- Modal -->
  <div class="modal fade" id="AddCurriculum" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">CURRICULUM</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body" id="curriculumBody">
            <!-- <div class="mb-3">
              <label for="Courses" class="form-label">SCHOOLYEAR</label>
              <input type="text" class="form-control" id="SCHOOLYEAR" placeholder="ADD SCHOOLYEAR">

              <label for="Courses" class="form-label">COURSE</label>
              <input type="text" class="form-control" id="COURSE" placeholder="ADD COURSE">


              <label for="Courses" class="form-label">YEAR</label>
                <select class="form-control" name="" id="YEAR">

                          <option value="">Select</option>
                          <option value="1st Year">1st Year</option>
                          <option value="2nd Year">2nd Year</option>
                          <option value="3rd Year">3rd Year</option>
                          <option value="4th Year">4th Year</option>


                </select>

              <label for="Courses" class="form-label">SUBJECT CODE</label>
              <input type="text" class="form-control" id="SUBJECTCODE" placeholder="ADD SUBJECT CODE">

              <label for="Courses" class="form-label">DESCRIPTION</label>
              <input type="text" class="form-control" id="DESCRIPTION" placeholder="ADD DESCRIPTION">

              <label for="Courses" class="form-label">UNITS</label>
              <input type="text" class="form-control" id="UNITS" placeholder="ADD UNITS">

              <label for="Courses" class="form-label">Semester</label>
              <input type="text" class="form-control" id="SEM" placeholder="ADD SEM">


            </div> -->
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
          <button type="button" class="btn btn-primary"  data-bs-dismiss="modal" onclick="AddCurriculum()">ADD</button>
        </div>
      </div>
    </div>
  </div>

<!-- Updaate Modal -->
  <div class="modal fade" id="Update_Curriculum" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Update Details</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            <div class="mb-3">
              <label for="Courses" class="form-label">SCHOOLYEAR</label>
              <input type="text" class="form-control" id="U_SCHOOLYEAR" placeholder="ADD SCHOOLYEAR">

             <label for="Courses" class="form-label">COURSE</label>
               <select class="form-control"  id="U_COURSE">
                  <option value="" disabled selected>Select Course</option>;
                      <?php
                      $sql = "SELECT * FROM `uccp_add_courses` WHERE status ='Enable';";
                      $result = mysqli_query($conn,$sql);
                                while($r = mysqli_fetch_assoc($result)){
                                echo'<option>'.$r['abbreviation'].'</option>';
                                };
                      ?>
                </select>



              <label for="Courses" class="form-label">YEAR</label>
                <select class="form-control" name="" id="U_YEAR">

                          <option value="">Select</option>
                          <option value="1st Year">1st Year</option>
                          <option value="2nd Year">2nd Year</option>
                          <option value="3rd Year">3rd Year</option>
                          <option value="4th Year">4th Year</option>


                </select>

              <label for="Courses" class="form-label">SUBJECT CODE</label>
              <input type="text" class="form-control" id="U_SUBJECTCODE" placeholder="ADD SUBJECT CODE">

              <label for="Courses" class="form-label">DESCRIPTION</label>
              <input type="text" class="form-control" id="U_DESCRIPTION" placeholder="ADD DESCRIPTION">

              <label for="Courses" class="form-label">UNITS</label>
              <input type="text" class="form-control" id="U_UNITS" placeholder="ADD UNITS">

              <label for="Courses" class="form-label">Semester</label>
              <input type="text" class="form-control" id="U_SEM" placeholder="ADD SEM">


            </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
          <button type="button" class="btn btn-primary"  onclick="updateCurriculum()" data-bs-dismiss="modal">Update</button>
          <input type="hidden" id="hiddendataC">
        </div>
      </div>
    </div>
  </div>

  <div class="container my-3 ">
    <div class="row">
          <div class="col-md-12">
              <div class="card">
                <div class="card-header">
                  <h1 align = "center">LIST OF APPROVED CURRICULUM</h1>
                </div>
                <div class="card-body">
                  <!-- Button trigger modal -->
                  <button type="button" class="btn btn-primary col-sm-2 mb-3" id="a" data-bs-toggle="modal" data-bs-target="#AddCurriculum">
                    <i class="fa fa-plus"></i>
                  </button>

      <table id="c" class="table text-center  cell-border table-hover" style="width:100%">
                <thead>
                    <tr align = "center">
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


  <script type="text/javascript">

  $(document).ready(function(){

    $('#a').click(function(){
                   
                   $.ajax({
                       url: 'sidebarpage/curriculum-modal-body.php',
                       type: 'post',
                       data: {},
                       success: function(response){ 
                           $('#curriculumBody').html(response); 
                           $('#AddCurriculums').modal('show'); 
                       }
                   });
               });







    var table1 =$('#c').DataTable({
      'serverside':true,
      'processing':false,
      'paging':true,
      "columnDefs": [
       {"className": "dt-center", "targets": "_all"},
        { "width": "25%", "targets": 0 },
        { "width": "40%", "targets": 1 },
        { "width": "10%", "targets": 2 },
    ],

                  'ajax':{

                    'url': 'sidebarpage/Curriculumtable.php',
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
  table1.ajax.reload(null, false);
  
//   // Set the search value back to the input element
//   $('#example_filter input').val(searchValue);
}, 5000);





 });


 function AddCurriculum(){


      var schoolyear =$('#SCHOOLYEAR').val();
      var course =$('#e').val();
      var year =$('#YEAR').val();
      var subcode =$('#SUBJECTCODE').val();
      var description =$('#DESCRIPTION').val();
      var units =$('#UNITS').val();
      var sem =$('#SEM').val();

      if( schoolyear, course, year, subcode, description ,units,sem== ""){
        alert("Please fill out missing fields");
        $('#e').val('');
        $('#SCHOOLYEAR').val('');
        $('#YEAR').val('');
        $('#SUBJECTCODE').val('');
        $('#DESCRIPTION').val('');
        $('#UNITS').val('');
        $('#SEM').val('');


        return false;
      }

        $.ajax({

            url:'sidebarpage/add-curriculum.php',
            type: 'post',
            data: {course: course , schoolyear:schoolyear ,year:year, subcode:subcode , description:description ,units:units, sem:sem },
            success:function(data,status){

              var json = JSON.parse(data);
              status = json.status;
              if(status =='success'){
              var c=  $('#c').DataTable().ajax.reload();
              }

                  $('#e').val('');
                  $('#SCHOOLYEAR').val('');
                  $('#YEAR').val('');
                  $('#SUBJECTCODE').val('');
                  $('#DESCRIPTION').val('');
                  $('#UNITS').val('');
                  $('#SEM').val('');

            }
        })

  }

  function updateC(update){

$('#hiddendataC').val(update);
$.post("sidebarpage/update-curriculum.php",{update:update},function(data,
  status){
    var c = JSON.parse(data);

    $('#U_SCHOOLYEAR').val(c.Schoolyear);
    $('#U_COURSE').val(c.Course);
    $('#U_YEAR').val(c.Year);
    $('#U_SUBJECTCODE').val(c.Subcode);
    $('#U_DESCRIPTION').val(c.Description);
    $('#U_UNITS').val(c.Units);
    $('#U_SEM').val(c.Sem);

});
 $('#Update_Curriculum').modal("show");

   }



function updateCurriculum(){


  var hiddendataC = $('#hiddendataC').val();
  var sy = $('#U_SCHOOLYEAR').val();
  var c = $('#U_COURSE').val();
  var y = $('#U_YEAR').val();
  var s = $('#U_SUBJECTCODE').val();
  var d = $('#U_DESCRIPTION').val();
  var u = $('#U_UNITS').val();
  var se = $('#U_SEM').val();



$.post("sidebarpage/update-curriculum.php", {
 hiddendataC:hiddendataC ,sy:sy,c:c,y:y,s:s,d:d,u:u,se:se
},function(data,status){
  var json = JSON.parse(data);
  status = json.status;
  if(status =='success'){

$('#c').DataTable().ajax.reload();


  }
});

}


function removeC(r){
        $.ajax({

            url:'sidebarpage/delete-curriculum.php',
            type: 'post',
            data: {removeC: r},
            success:function(data,status){

              var json = JSON.parse(data);
              status = json.status;
              if(status =='success'){

            $('#c').DataTable().ajax.reload();


              }
            }
        })
  }





  </script>

