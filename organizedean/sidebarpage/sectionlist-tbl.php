<?php


include ("../include/config.php");


$result = mysqli_query($conn,"SELECT * FROM `uccp_enrolled` WHERE section = '';");

$rows = array();
$data = array();
while ($row = mysqli_fetch_array($result)) {

  $id = $row['id'];
  $name = $row['name'];
  $course = $row['course'];
  $year= $row['year'];
  $section = $row['section'];



$subarray= array();

  $subarray[]= '<td><input type="checkbox" name="selector[]" class ="checkOne" value='.$id.'></td>';
  $subarray[]= '<td>'.$name.'</td>';
  $subarray[]= '<td>'.$course.'</td>';
  $subarray[]= '<td>'.$year.'</td>';
  $subarray[]= '<td>'.$section.'</td>';

  $data[]=$subarray;
   }


   $output = array(
     'data'=>$data,

   );

   echo json_encode($output);


 ?>
