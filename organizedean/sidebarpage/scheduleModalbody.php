
<?php

include ("../include/config.php");

$output = '';


$output.= ' 

<label for="Courses" class="form-label">Course/Yr/Section</label>
               <select class="form-control" name="" id="cys" >
                 <option value="">Select</option>

';


$q = "SELECT  * FROM `uccp_section` ";
$results = mysqli_query($conn,$q);

while($r = mysqli_fetch_assoc($results)){
    $output.= '<option>'.$r['courseyearsection'].'</option>';
  }

  $output.='</select>';


  $output.='  <label for="Courses" class="form-label">Subject Code</label> <br>
  <select class="form-control"  id="subcode" style="width:100%" >
    <option value="" class="chosen" >Select</option>';

     $sql= "SELECT * FROM `uccp_approvedcurriculum`";
                   $result = mysqli_query($conn,$sql);

                     while($r1 = mysqli_fetch_assoc($result)){
                       $output.= '<option>'.$r1['Subcode'].'</option>';
                     };

                     $output.='</select>';


  $output.='<label for="Courses" class="form-label">Subject Name</label>
  <select class="form-control"  id="subname" style="width:100%" >
    <option value="" class="chosen" >Select</option>';


     $sql= "SELECT * FROM `uccp_approvedcurriculum` ";
                   $result = mysqli_query($conn,$sql);

                     while($r1 = mysqli_fetch_assoc($result)){
                       $output.= '<option>'.$r1['Description'].'</option>';
                     };

    $output.='</select>';


$output.='  <label for="Courses" class="form-label">Units</label>
<select class="form-control"  id="units" style="width:100%" >
  <option value="" class="chosen" >Select</option>';

    $sql= "SELECT DISTINCT Units FROM `uccp_approvedcurriculum`  ";
                   $result = mysqli_query($conn,$sql);

                     while($r1 = mysqli_fetch_assoc($result)){
                     $output.= '<option>'.$r1['Units'].'</option>';;
                     }

$output.='</select>';

$output.='<label for="Courses" class="form-label mt-1">DAY</label>
<select class="form-control"  id="day" style="width:100%" >
  <option value="" disabled selected>Select</option>
  <option value="Monday" >Monday</option>
  <option value="Tuesday" >Tuesday</option>
  <option value="Wednesday" >Wednesday</option>
  <option value="Thursday" >Thursday</option>
  <option value="Friday" >Friday</option>
  <option value="Saturday" >Saturday</option>
  <option value="Sunday" >Sunday</option>
</select>';

$output.='   <label for="Courses" class="form-label">Start Time</label>
<input type="text" class="form-control" id="start-time" placeholder="Enter Start Time">

<label for="Courses" class="form-label">End Time</label>
<input type="text" class="form-control" id="end-time" placeholder="Enter End-Time">


<label for="Courses" class="form-label">Professor</label> <br>
<select class="form-control"  id="professor" style="width:100%" >
  <option value="" class="chosen" >Select</option>';

     $sql= "SELECT * FROM `uccp_professor`";
                   $result = mysqli_query($conn,$sql);

                     while($r1 = mysqli_fetch_assoc($result)){
                      $output.= '<option>'.$r1['fullname'].'</option>';;
                     }

$output.='</select>';

$output.='  <label for="Courses" class="form-label">Room</label>
<input type="text" class="form-control" id="room" placeholder="Enter Room">';






echo $output;



  ?>
 
 <script type="text/javascript">
       $("document").ready(function () {
        $("#subcode").select2({
    dropdownParent: $('#AddSched .modal-content')

});

$("#subname").select2({
  dropdownParent: $('#AddSched .modal-content')

});

$("#professor").select2({
  dropdownParent: $('#AddSched .modal-content')

});

        
       });