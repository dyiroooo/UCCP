<?php

  include ("include/config.php");

if(isset($_POST['uenrollid'])){

  $ids =$_POST['uenrollid'];

  $sql = "SELECT * FROM `uccp_enrollment_schedule` WHERE id= $ids";
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
  $sy = $_POST['updateSY1'];
  $sem = $_POST['updateSEM'];



  $sql = "UPDATE `uccp_enrollment_schedule` SET schoolyear='$sy',sem ='$sem' WHERE id='$ids'";
  $results= mysqli_query($conn,$sql);

  }





 ?>
