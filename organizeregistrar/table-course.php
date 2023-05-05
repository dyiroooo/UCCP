<?php

include('include/config.php');

$sql= "SELECT * FROM `uccp_add_courses`";
$result= mysqli_query($conn,$sql);

$rows = array();
$data = array();
while ($row = mysqli_fetch_array($result)) {



  $Course = $row['courses'];
  $Status = $row['status'];
  $abbreviation= $row['abbreviation'];

$subarray= array();

$subarray[]=  ' <td >'.$Course.'</td>';
$subarray[]=  ' <td >'.$abbreviation.'</td>';
$subarray[]= '<td ><font color="Red"><strong>'.$Status.'</strong></font> </td>';

$subarray[]=   '  <td >
      <button class="btn btn-success" onclick="update('.$row['id'].')"><i class="fa-sharp fa-solid fa-pen"></i></button>
  
    </td>';



$data[]=$subarray;
}


$output = array(
  'data'=>$data,


);

echo json_encode($output);





 ?>
