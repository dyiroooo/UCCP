<?php

include ("../include/config.php");


$result = mysqli_query($conn,"SELECT * FROM `uccp_professor`");

$rows = array();
$data = array();
while ($row = mysqli_fetch_array($result)) {


$faculty = $row['faculty'];
$email = $row['email'];
$address = $row['address'];
$gender = $row['gender'];
$contact = $row['contact'];

$fullname = $row['fullname'];

$subarray= array();

$subarray[]= '<td><strong>'.$fullname.'  </strong><br> '.$gender.'  <br> '.$address.'  <br> '.$email.'  <br> '.$contact.'     </td>';

$subarray[]= '<td>'.$faculty.'</td>';

$subarray[]=   '  <td>
   <button class="btn btn-success" onclick="updateP('.$row['id'].')"><i class="fa-sharp fa-solid fa-pen"></i></button>
   <button class="btn btn-danger" onclick="removeP('.$row['id'].')"><i class="fa-sharp fa-solid fa-trash"></i></button>

   </td>';



$data[]=$subarray;
}


$output = array(
 'data'=>$data,


);

echo json_encode($output);


 ?>
