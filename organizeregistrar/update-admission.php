<?php

include('include/config.php');

if(isset($_POST['uid'])){

  $ids =$_POST['uid'];

  $sql = "SELECT * FROM `uccp_admission_schedule` WHERE id= '$ids'";
  $result= mysqli_query($conn,$sql);
  $response= array();

  while($row = mysqli_fetch_assoc($result)){
    $response =$row;
  }
  echo json_encode($response);

  }
  else {
  $response['status']=200;
  $response['message']='Invalid or data not found';
  }

  if(isset($_POST['hidden'])){

  $ids = $_POST['hidden'];
  $sy = $_POST['updateSY'];

  $sql = "UPDATE `uccp_admission_schedule` SET schoolyear='$sy' WHERE id='$ids'";
  $results= mysqli_query($conn,$sql);

  }





 ?>
