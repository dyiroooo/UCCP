
<?php

include ("../include/config.php");

$output = '';


$output.= '  <label for="Courses" class="form-label">COURSE</label>
<select class="form-control" name="" id="course">
    <option value="" disabled selected>Select Course</option>';

    $sql = "SELECT * FROM `uccp_add_courses` WHERE status ='Enable';";
    $result = mysqli_query($conn,$sql);

      while($r = mysqli_fetch_assoc($result)){

        $output.= '<option>'.$r['abbreviation'].'</option>';
      };

     

      $output.='</select>';

      $output.='  <label for="Courses" class="form-label">Year</label>

      <select class="form-control" name="" id="year">
      <option   value="" disabled selected>Select Year</option>
      <option value="1st">1st Year</option>
      <option value="2nd">2nd Year</option>
      <option value="3rd">3rd Year</option>
      <option value="4th">4th Year</option>

      </select>

        <label for="Courses" class="form-label">SECTION</label>
        <input type="text" class="form-control" id="sections" placeholder="Create Section">

';



echo $output;



  ?>
