
    <!-- Modal -->
      <div class="modal fade" id="s" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">CURRICULUM</h5>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body" id="sectionModalbody">
                <!-- <div class="mb-3">
                  <label for="Courses" class="form-label">COURSE</label>
                  <select class="form-control" name="" id="course">
                      <option value="" disabled selected>Select Course</option>

                     <?php
                      // include ("../include/config.php");
                      // $sql = "SELECT * FROM `uccp_add_courses` WHERE status ='Enable';";
                      // $result = mysqli_query($conn,$sql);

                      //   while($r = mysqli_fetch_assoc($result)){

                      //     echo '<option>'.$r['abbreviation'].'</option>';
                        // } -->

                       ?>
                  </select>
                <label for="Courses" class="form-label">Year</label>

                <select class="form-control" name="" id="year">
                <option   value="" disabled selected>Select Year</option>
                <option value="1st">1st Year</option>
                <option value="2nd">2nd Year</option>
                <option value="3rd">3rd Year</option>
                <option value="4th">4th Year</option>

                </select>

                  <label for="Courses" class="form-label">SECTION</label>
                  <input type="text" class="form-control" id="sections" placeholder="Create Section">



                </div> -->
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
              <button type="button" class="btn btn-primary"  data-bs-dismiss="modal" onclick="Addsection()">ADD</button>
            </div>
          </div>
        </div>
      </div>



      <!-- Updaate Modal -->
        <div class="modal fade" id="Update_Section" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Update Details</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
              </div>
              <div class="modal-body">
                  <div class="mb-3">

                    <label for="Courses" class="form-label">COURSE</label>
                    <select class="form-control" name="" id="update_course">
                        <option value="" disabled selected>Select Course</option>

                        <?php
                        include ("../include/config.php");
                        $sql = "SELECT * FROM `uccp_add_courses` WHERE status ='Enable';";
                        $result = mysqli_query($conn,$sql);

                          while($r = mysqli_fetch_assoc($result)){

                            echo '<option>'.$r['abbreviation'].'</option>';
                          }

                         ?>
                    </select>
                  <label for="Courses" class="form-label">Year</label>

                  <select class="form-control" name="" id="update_year">
                  <option   value="" disabled selected>Select Year</option>
                  <option value="1st">1st Year</option>
                  <option value="2nd">2nd Year</option>
                  <option value="3rd">3rd Year</option>
                  <option value="4th">4th Year</option>

                  </select>

                    <label for="Courses" class="form-label">SECTION</label>
                    <input type="text" class="form-control" id="update_sections" placeholder="Create Section">


                  </div>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary"  onclick="updatesection()" data-bs-dismiss="modal">Update</button>
                <input type="hidden" id="hiddendataS">
              </div>
            </div>
          </div>
        </div>



  <div class="container my-3 ">
    <div class="row">
          <div class="col-md-12">
              <div class="card">
                <div class="card-header">
                  <h1 align = "center">LIST OF SECTION</h1>
                </div>
                <div class="card-body">
          <!-- Button trigger modal -->
          <button type="button" class="btn btn-primary col-sm-2 mb-3" data-bs-toggle="modal" data-bs-target="#s" id="buttonSection">
            <i class="fa fa-plus"></i>
          </button>


                <table id="sec" class="table text-center  cell-border table-hover" style="width:100%">
                          <thead>
                              <tr align = "center">
                                <th class="text-center">Course</th>
                                <th class="text-center">Year</th>
                                <th class="text-center">Section</th>
                                <th class="text-center">Course-Year-Section</th>
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



    $('#buttonSection').click(function(){
                   
                   $.ajax({
                       url: 'sidebarpage/sectionModalbody.php',
                       type: 'post',
                       data: {},
                       success: function(response){ 
                           $('#sectionModalbody').html(response); 
                           $('#s').modal('show'); 
                       }
                   });
               });



    $('#sec').DataTable({
      'serverside':true,
      'processing':true,
      'paging':true,
      "columnDefs": [
       {"className": "dt-center", "targets": "_all"}

    ],

                  'ajax':{

                    'url': 'sidebarpage/sectiontable.php',
                    'type':'post',

                  },
                  'fnCreateRow':function(nRow,aData,iDataIndex){
                    $(nRow).attr('id',aData[0]);
                  },

             });



 });

 function Addsection(){

      var course =$('#course').val();
      var year =$('#year').val();
      var section =$('#sections').val().toUpperCase();
      var trim = year.slice(0,-2);


      if( course, year, section == ""){
        alert("Please fill out missing fields");
        $('#course').val('');
        $('#year').val('');
        $('#sections').val('');

        return false;
      }

        $.ajax({

            url:'sidebarpage/add-section.php',
            type: 'post',
            data: {course:course ,section:section ,year:year,trim:trim},
            success:function(data,status){

              var json = JSON.parse(data);
              status = json.status;

              if(status =='success'){
              var c=  $('#sec').DataTable().ajax.reload();
              }
              $('#course').val('');
              $('#year').val('');
              $('#sections').val('');


            }
        })

  }



  function updateSS(update){

$('#hiddendataS').val(update);
$.post("sidebarpage/update-section.php",{update:update},function(data,
  status){
    var c = JSON.parse(data);

    $('#update_course').val(c.course);
    $('#update_year').val(c.year);
    $('#update_sections').val(c.section);

});
 $('#Update_Section').modal("show");

   }


   function updatesection(){


     var hiddendataS = $('#hiddendataS').val();
     var c = $('#update_course').val();
     var y = $('#update_year').val();
     var s = $('#update_sections').val().toUpperCase();
     var trim = y.slice(0,-2);
     var cys = c+"-"+trim+s;




   $.post("sidebarpage/update-section.php", {
    hiddendataS:hiddendataS,c:c,y:y,s:s,cys:cys
   },function(data,status){
     var json = JSON.parse(data);
     status = json.status;
     if(status =='success'){
   $('#sec').DataTable().ajax.reload();
     }
   });

   }


   function removeS(r){
           $.ajax({

               url:'sidebarpage/delete-section.php',
               type: 'post',
               data: {removeS: r},
               success:function(data,status){

                 var json = JSON.parse(data);
                 status = json.status;
                 if(status =='success'){

               $('#sec').DataTable().ajax.reload();


                 }
               }
           })
     }


</script>

