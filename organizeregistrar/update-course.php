<?php

include('include/config.php');

if(isset($_POST['update'])){
  $id = $_POST['update'];

  $sql = "SELECT * FROM `uccp_add_courses` WHERE id= $id";
  $result= mysqli_query($conn,$sql);
  $response= array();

  while($row = mysqli_fetch_assoc($result)){
    $response =$row;
  }
  echo json_encode($response);

}else {
  $response['status']=200;
  $response['message']='Invalid or data not found';
}


if(isset($_POST['hiddendata'])){
$s = $_POST['hiddendata'];
$c = $_POST['updateCourse'];
$S= $_POST['updatestatus'];
$a= $_POST['updateAbbreviation'];





$sql1 = "UPDATE `uccp_add_courses` SET `courses`='$c',`status`='$S', `abbreviation`='$a' WHERE id=$s";
$results= mysqli_query($conn,$sql1);


if($sql1 == true){

  $data = array(
    'status'=>'success',
  );
  echo json_encode($data);
}else {

  $data = array(
    'status'=>'failed',
  );
  echo json_encode($data);
}
}
 
?>