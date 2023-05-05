
<?php

include ("../include/config.php");

$output = '';


$output.= ' <label for="Courses" class="form-label">COURSE</label>
<select class="form-control"  id="e">
    <option value="" disabled selected>Select Course</option>';

    $sql = "SELECT DISTINCT courseyearsection FROM `uccp_section`";
    $result = mysqli_query($conn,$sql);


     while($r = mysqli_fetch_assoc($result)){
          $output.= '<option>'.$r['courseyearsection'].'</option>';
      } 
      
echo $output;

  ?>
