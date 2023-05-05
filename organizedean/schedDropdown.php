
<?php

include ("../include/config.php");

$output = '';


$output.= '<select class="form-control" name="" id="cyss" >
<option value="" id="op">Select</option> ';

$sql= "SELECT DISTINCT `courseyearsection` FROM `uccp_sched`";


$result = mysqli_query($conn,$sql);
     while($r = mysqli_fetch_assoc($result)){
        
          $output.= '<option>'.$r['courseyearsection'].'</option>';
        
      } 

      $output.='</select>';
    
               
echo $output;



  ?>  
