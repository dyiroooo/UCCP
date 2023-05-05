
<?php

include ("../include/config.php");

$output = '<select class="form-control" name="SY" id="masterlist-section">
<option value="" class="text-center">SELECT</option>';


$sql= "SELECT DISTINCT `courseyearsection` FROM `uccp_sched`"; 
$results = mysqli_query($conn,$sql);

while($r = mysqli_fetch_assoc($results)){
    $output.= '<option>'.$r['courseyearsection'].'</option>';
  }
      $output.='</select>';
    
               
echo $output;



  ?>  
