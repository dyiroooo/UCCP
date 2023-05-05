<?php


include ("include/config.php");


$result = mysqli_query($conn,"SELECT * FROM `uccp_eval`");

$rows = array();
$data = array();
while ($row = mysqli_fetch_array($result)) {

  $name = $row['name'];
  $section = $row['section'];
  $remarks = $row['remarks'];
  $schoolyear = $row['schoolyear'];
  $sem= $row['sem'];



$subarray= array();


  $subarray[]= '<td>'.$name.'</td>';
  $subarray[]= '<td>'.$schoolyear.'</td>';
  $subarray[]= '<td>'.$section.'</td>';
  $subarray[]= '<td>'.$sem.'</td>';
  $subarray[]= '<td>'.$remarks.'</td>';


  $data[]=$subarray;
   }


   $output = array(
     'data'=>$data,

   );

   echo json_encode($output);


 ?>
