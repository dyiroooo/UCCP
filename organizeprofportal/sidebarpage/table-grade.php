<?php
  include ("../include/config.php");

  $sql= "SELECT * FROM `uccp_grading` WHERE `courseyearsection` != ''";
  $result = mysqli_query($conn,$sql);

  $rows = array();
  $data = array();
  while ($row = mysqli_fetch_array($result)) {

  $name=  $row['name'];
  $cys=  $row['courseyearsection'];
  $subcode=  $row['subjectcode'];
  $midterms=  $row['midterm'];
  $finals=  $row['finals'];
  $average=  $row['average'];
  $remarks=  $row['remarks'];

  $subarray= array();

    $subarray[]=  ' <td >'.$name.'</td>';
    $subarray[]=  ' <td >'.$cys.'</td>';
    $subarray[]=  ' <td >'.$subcode.'</td>';
    $subarray[]=  ' <td >'.$midterms.'</td>';
    $subarray[]=  ' <td >'.$finals.'</td>';
    $subarray[]=  ' <td >'.$average.'</td>';
    $subarray[]=  ' <td >'.$remarks.'</td>';

  $subarray[]=   '  <td >
        <button class="btn btn-success" onclick="updateG('.$row['id'].')">SET GRADE</button>
        <button class="btn btn-success" onclick="updateRemarks('.$row['id'].')">SET REMARKS</button>
      </td>';

  $data[]=$subarray;
  }


  $output = array(
    'data'=>$data,


  );

  echo json_encode($output);



 ?>
