
<?php

include ("../include/config.php");

$output = '';


$output.= ' <label for="Courses" class="form-label">SCHOOLYEAR</label>
<input type="text" class="form-control" id="SCHOOLYEAR" placeholder="ADD SCHOOLYEAR">';




$output.= ' <label for="Courses" class="form-label">COURSE</label>
<select class="form-control"  id="e">
    <option value="" disabled selected>Select Course</option>';



$sql = "SELECT * FROM `uccp_add_courses` WHERE status ='Enable';";
$result = mysqli_query($conn,$sql);

              while($r = mysqli_fetch_assoc($result)){

                $output.=  '<option>'.$r['abbreviation'].'</option>';

         };

         $output.='</select>';


$output.='  <label for="Courses" class="form-label">YEAR</label>
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
<input type="text" class="form-control" id="SEM" placeholder="ADD SEM">';



echo $output;



  ?>
