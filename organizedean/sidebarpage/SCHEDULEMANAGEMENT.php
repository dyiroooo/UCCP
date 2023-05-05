 <?php
  //  $sql= "SELECT DISTINCT `courseyearsection` FROM `uccp_sched`";
  //  $result = mysqli_query($conn,$sql);
    ?>

<div class="container py-3">
    <div class="row">
          <div class="col-md-12">
              <div class="card">
                <div class="card-header">
                  <h1 align = "center">LIST OF SCHEDULE</h1>
                  <div class="mb-4 text-center mt-4 " id="vb">
                      <select class="form-control" id="cyss" >
                        <option value="" id="op">Select</option>
                          <?php
                          
                            // while($row = mysqli_fetch_assoc($result)){
                            //  echo '<option>'.$row['courseyearsection'].'</option>'; 
                            // }
                           ?>
                      </select>
                  </div>

   <button type="button" class="btn btn-primary col-sm-2 mb-3" id="addSchedmanagenent" data-bs-toggle="modal" data-bs-target="#AddSched"><i class="fa fa-plus"></i></button>
                </div>
                  <div class="card-body">

                     <table id="schedule" class="table text-center  cell-border table-striped table-hover" style="width:100%">
                                       <thead>
                                           <tr align = "center">
                                             <th class="text-center">COURSE/YEAR/SECTION</th>
                                             <th class="text-center">Subject Details</th>
                                             <th class="text-center">Units</th>
                                             <th class="text-center">DAY</th>
                                             <th class="text-center">Start-Time</th>
                                             <th class="text-center">End-Time</th>
                                             <th class="text-center">Professor</th>
                                             <th class="text-center">Room</th>
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
       $("document").ready(function () {

        $('#cyss').load('sidebarpage/schedDropdown.php');
//   $("#cyss").on('click', function(event){
   



//               $.ajax({
//                      url: 'sidebarpage/schedDropdown.php',
//                      type: 'post',
//                      data: {},
//                      success: function(response){  
//                       event.stopPropagation();
//                       $("#cyss").html(response);
                      
                     
//                      }
                  
//                  });
// });







    $('#addSchedmanagenent').click(function(){
                   
                   $.ajax({
                       url: 'sidebarpage/scheduleModalbody.php',
                       type: 'post',
                       data: {},
                       success: function(response){ 
                           $('#scheduleModalbody').html(response); 
                           $('#AddSched').modal('show'); 
                       }
                   });
               });



      var sched=   $('#schedule').DataTable({
           'serverside':true,
           'processing':true,
           'paging':true,
           "columnDefs": [
            {"className": "dt-center", "targets": "_all"},

        ],
                       'ajax':{

                         'url': 'sidebarpage/table-sched.php',
                         'type':'post',

                       },
                       'fnCreateRow':function(nRow,aData,iDataIndex){
                         $(nRow).attr('id',aData[0]);
                       },
                     });



          sched.column(0).visible( false );

           $('#cyss').on('click', function () {

                        sched.search( this.value ).draw();
                      
               

                      } );


                      $('input[type="search"]').on( 'keyup', function () {
                                var s =($(this).val());


                                if(s == ""){
                                    $('#cyss').val('').change();


                                }

                    } );



 $("#subcode").select2({
    dropdownParent: $('#AddSched .modal-content')

});

$("#subname").select2({
  dropdownParent: $('#AddSched .modal-content')

});

$("#professor").select2({
  dropdownParent: $('#AddSched .modal-content')

});




$("#update_professor").select2({
  dropdownParent: $('#update .modal-content')

});


$("#update_subname").select2({
  dropdownParent: $('#update .modal-content')

});

$("#update_subcode").select2({
  dropdownParent: $('#update .modal-content')

});


       });

// $("#subcode").select2({
//    dropdownParent: $("#AddSched")
//  });






function addsched(){


     var cys =$('#cys').val();
     var subcode =$('#subcode').val();
     var subname =$('#subname').val();
     var day =$('#day').val();
     var starttime =$('#start-time').val();
     var endtime =$('#end-time').val();
     var professor=$('#professor').val();
     var room =$('#room').val();
     var units =$('#units').val();



     if( cys, subcode, subname, day, starttime ,endtime,professor,room== ""){
       alert("Please fill out missing fields");
       $('#cys').val('');
       $('#subcode').val('');
       $('#subname').val('');
       $('#day').val('');
       $('#start-time').val('');
       $('#end-time').val('');
       $('#professor').val('');
       $('#room').val('');
       $('#units').val('');

       return false;
     }

       $.ajax({

           url:'sidebarpage/add-sched.php',
           type: 'post',
           data: {cys: cys , subcode:subcode ,subname:subname, day:day , starttime:starttime ,endtime:endtime, professor:professor,room:room,units:units  },
           success:function(data,status){

             var json = JSON.parse(data);
             status = json.status;

             if(status =='success'){
             var c=  $('#schedule').DataTable().ajax.reload();
             $('#cyss').load('sidebarpage/schedDropdown.php');
             $('#masterlist-section').load('sidebarpage/masterlistDropdown.php');
             
             }

             $('#cys').val("");
             $("#subcode").val('').trigger('change');
             $("#subname").val('').trigger('change');
             $('#day').val("");
             $('#start-time').val("");
             $('#end-time').val("");
             $("#professor").val('').trigger('change');
             $('#room').val("");
             $('#units').val("");
    
           }
       })

 }




 function updatex(update){

$('#hiddendataSched').val(update);
$.post("sidebarpage/update-sched.php",{update:update},function(data,
 status){
   var c = JSON.parse(data);
    
   
   $('#update_subname').val(c.subjectname).trigger('change');
   $('#update_subcode').val(c.subjectcode).trigger('change');
   $('#update_room').val(c.room);
   $('#update_professor').val(c.professor).trigger('change');
   $('#update_end-time').val(c.endtime);
   $('#update_start-time').val(c.starttime);
   $('#update_day').val(c.day);
   $('#update_units').val(c.units);
   $('#update_c').val(c.courseyearsection);
  

});
$('#update').modal("show");

  }


  function updateSched(){


    var hiddendataSched = $('#hiddendataSched').val();

    var course = $('#update_c').val();
    var room = $('#update_room').val();
    var prof = $('#update_professor').val();
    var et = $('#update_end-time').val();
    var st = $('#update_start-time').val();
    var day = $('#update_day').val();
    var units = $('#update_units').val();
    var subname = $('#update_subname').val();
    var subcode = $('#update_subcode').val();





  $.post("sidebarpage/update-sched.php", {
   hiddendataSched:hiddendataSched,course:course,room:room,prof:prof,
   et:et,st:st,day:day,units:units,subname:subname,subcode:subcode
  },function(data,status){
      
    var json = JSON.parse(data);
    status = json.status;
    if(status =='success'){

  $('#schedule').DataTable().ajax.reload();


    }
  });
}

function deleteS(r){
        $.ajax({

            url:'sidebarpage/delete-sched.php',
            type: 'post',
            data: {deleteS: r},
            success:function(data,status){

              var json = JSON.parse(data);
              status = json.status;
              if(status =='success'){

            $('#schedule').DataTable().ajax.reload();
            $('#cyss').load('sidebarpage/schedDropdown.php');
            $('#masterlist-section').load('sidebarpage/masterlistDropdown.php');
            


              }
            }
        })
  }



//   function showDropInfo(){
//     $.ajax({

// url:'sidebarpage/schedDropdown.php',
// type: 'post',
// data: {},
// success:function(response){


// $('#cyss').html.append(response);



// }
// })
//   }

       </script>
       
       
       
       

              
              



<?php
      include ("include/config.php");
      $q = "SELECT  * FROM `uccp_section` ";
      $results = mysqli_query($conn,$q);

 ?>



 <!-- Modal -->
   <div class="modal fade" id="AddSched" aria-labelledby="exampleModalLabel" aria-hidden="true">
     <div class="modal-dialog">
       <div class="modal-content">
         <div class="modal-header">
           <h5 class="modal-title" id="exampleModalLabel">CURRICULUM</h5>
           <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
         </div>
     <div class="modal-body" id="scheduleModalbody">
           <!-- <label for="Courses" class="form-label">Course/Yr/Section</label>
               <select class="form-control" name="" id="cys" >
                 <option value="">Select</option>
                   <?php
                    //  while($r = mysqli_fetch_assoc($results)){
                    //    echo '<option>'.$r['courseyearsection'].'</option>';
                    //  }
                    ?>
               </select>
               
                <label for="Courses" class="form-label">Subject Code</label> <br>
               <select class="form-control"  id="subcode" style="width:100%" >
                 <option value="" class="chosen" >Select</option>
                   <?php
                  //  $sql= "SELECT * FROM `uccp_approvedcurriculum`";
                  //  $result = mysqli_query($conn,$sql);

                  //    while($r1 = mysqli_fetch_assoc($result)){
                  //      echo '<option>'.$r1['Subcode'].'</option>';;
                  //    }
                    ?>

               </select>


 <label for="Courses" class="form-label">Subject Name</label>
               <select class="form-control"  id="subname" style="width:100%" >
                 <option value="" class="chosen" >Select</option>
                   <?php
                  //  $sql= "SELECT * FROM `uccp_approvedcurriculum`  ";
                  //  $result = mysqli_query($conn,$sql);

                  //    while($r1 = mysqli_fetch_assoc($result)){
                  //      echo '<option>'.$r1['Description'].'</option>';;
                  //    }
                    ?>

               </select>
               
                <label for="Courses" class="form-label">Units</label>
               <select class="form-control"  id="units" style="width:100%" >
                 <option value="" class="chosen" >Select</option>
                   <?php
                  //  $sql= "SELECT DISTINCT Units FROM `uccp_approvedcurriculum`  ";
                  //  $result = mysqli_query($conn,$sql);

                  //    while($r1 = mysqli_fetch_assoc($result)){
                  //      echo '<option>'.$r1['Units'].'</option>';;
                  //    }
                    ?>

               </select>

 <label for="Courses" class="form-label mt-1">DAY</label>
               <select class="form-control"  id="day" style="width:100%" >
                 <option value="" disabled selected>Select</option>
                 <option value="Monday" >Monday</option>
                 <option value="Tuesday" >Tuesday</option>
                 <option value="Wednesday" >Wednesday</option>
                 <option value="Thursday" >Thursday</option>
                 <option value="Friday" >Friday</option>
                 <option value="Saturday" >Saturday</option>
                 <option value="Sunday" >Sunday</option>
               </select>
               
               <label for="Courses" class="form-label">Start Time</label>
               <input type="text" class="form-control" id="start-time" placeholder="Enter Start Time">

               <label for="Courses" class="form-label">End Time</label>
               <input type="text" class="form-control" id="end-time" placeholder="Enter End-Time">
               
               
              <label for="Courses" class="form-label">Professor</label> <br>
               <select class="form-control"  id="professor" style="width:100%" >
                 <option value="" class="chosen" >Select</option>
                   <?php
                  //  $sql= "SELECT * FROM `uccp_professor`";
                  //  $result = mysqli_query($conn,$sql);

                  //    while($r1 = mysqli_fetch_assoc($result)){
                  //      echo '<option>'.$r1['fullname'].'</option>';;
                  //    }
                    ?>

               </select>
  
  
               
                <label for="Courses" class="form-label">Room</label>
               <input type="text" class="form-control" id="room" placeholder="Enter Room">

               </div>    
               </div>
               </div>
               </div>   -->
               
       </div>
         <div class="modal-footer">
           <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
           <button type="button" class="btn btn-primary"  data-bs-dismiss="modal" onclick="addsched()">ADD</button>
         </div>
       </div>
     </div>
   </div>

                          <?php
      include ("include/config.php");
      $q = "SELECT  * FROM `uccp_section` ";
      $results = mysqli_query($conn,$q);

 ?>

     
     
      <!--UPDATE Modal -->
   <div class="modal fade" id="update" aria-labelledby="exampleModalLabel" aria-hidden="true">
     <div class="modal-dialog">
       <div class="modal-content">
         <div class="modal-header">
           <h5 class="modal-title" id="exampleModalLabel">CURRICULUM</h5>
           <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
         </div>
     <div class="modal-body">
         
           <label for="Courses" class="form-label">Course/Yr/Section</label>
               <select class="form-control" name="" id="update_c" >
                 <option value="">Select</option>
                   <?php
                     while($r = mysqli_fetch_assoc($results)){
                       echo '<option>'.$r['courseyearsection'].'</option>';;
                     }
                    ?>
               </select>
               

 <label for="Courses" class="form-label">Subject Code</label> <br>
               <select class="form-control"  id="update_subcode" style="width:100%" >
                 <option value="" class="chosen" >Select</option>
                   <?php
                   $sql= "SELECT * FROM `uccp_approvedcurriculum`";
                   $result = mysqli_query($conn,$sql);

                     while($r1 = mysqli_fetch_assoc($result)){
                       echo '<option>'.$r1['Subcode'].'</option>';;
                     }
                    ?>

               </select>
  

 <label for="Courses" class="form-label">Subject Name</label>
               <select class="form-control"  id="update_subname" style="width:100%" >
                 <option value="" class="chosen" >Select</option>
                   <?php
                   $sql= "SELECT * FROM `uccp_approvedcurriculum`  ";
                   $result = mysqli_query($conn,$sql);

                     while($r1 = mysqli_fetch_assoc($result)){
                       echo '<option>'.$r1['Description'].'</option>';;
                     }
                    ?>

               </select>
               
                <label for="Courses" class="form-label">Units</label>
               <select class="form-control"  id="update_units" style="width:100%" >
                 <option value="" class="chosen" >Select</option>
                   <?php
                   $sql= "SELECT DISTINCT Units FROM `uccp_approvedcurriculum`";
                   $result = mysqli_query($conn,$sql);

                     while($r1 = mysqli_fetch_assoc($result)){
                       echo '<option>'.$r1['Units'].'</option>';;
                     }
                    ?>

               </select>

 <label for="Courses" class="form-label mt-1">DAY</label>
               <select class="form-control"  id="update_day" style="width:100%" >
                 <option value="" disabled selected>Select</option>
                 <option value="Monday" >Monday</option>
                 <option value="Tuesday" >Tuesday</option>
                 <option value="Wednesday" >Wednesday</option>
                 <option value="Thursday" >Thursday</option>
                 <option value="Friday" >Friday</option>
                 <option value="Saturday" >Saturday</option>
                 <option value="Sunday" >Sunday</option>
               </select>
               
               <label for="Courses" class="form-label">Start Time</label>
               <input type="text" class="form-control" id="update_start-time" placeholder="Enter Start Time">

               <label for="Courses" class="form-label">End Time</label>
               <input type="text" class="form-control" id="update_end-time" placeholder="Enter End-Time">
               
               
              <label for="Courses" class="form-label">Professor</label> <br>
               <select class="form-control"  id="update_professor" style="width:100%" >
                 <option value="" class="chosen" >Select</option>
                   <?php
                   $sql= "SELECT * FROM `uccp_professor`";
                   $result = mysqli_query($conn,$sql);

                     while($r1 = mysqli_fetch_assoc($result)){
                       echo '<option>'.$r1['fullname'].'</option>';;
                     }
                    ?>

               </select>
  
  
               
                <label for="Courses" class="form-label">Room</label>
               <input type="text" class="form-control" id="update_room" placeholder="Enter Room">

               
       </div>
         <div class="modal-footer">
           <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
           <button type="button" class="btn btn-primary"  data-bs-dismiss="modal" onclick="updateSched()">ADD</button>
            <input type="hidden" id="hiddendataSched">
         </div>
       </div>
     </div>
   </div>

     

      
       
