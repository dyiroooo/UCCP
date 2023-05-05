<?php


include ("../include/config.php");


$result = mysqli_query($conn,"SELECT * FROM `uccp_masterlist`");

$rows = array();
$data = array();
while ($row = mysqli_fetch_array($result)) {

  $name = $row['name'];
  $section = $row['section'];
  $schoolyear = $row['schoolyear'];
  $sem= $row['sem'];
  $remarks = $row['remarks'];



$subarray= array();


  $subarray[]= '<td>'.$name.'</td>';
  $subarray[]= '<td>'.$section.'</td>';
  $subarray[]= '<td>'.$schoolyear.'</td>';
  $subarray[]= '<td>'.$sem.'</td>';
  $subarray[]= '<td>'.$remarks.'</td>';
  $subarray[]=   '  <td >
        <button class="btn btn-success" onclick="addRemarks('.$row['id'].')">Set Remarks</button>
      </td>';
  $data[]=$subarray;
   }


   $output = array(
     'data'=>$data,

   );

   echo json_encode($output);


 ?>
