<?php

  include ("../include/config.php");


if(isset($_POST['update'])){
  $id = $_POST['update'];

  $sql = "SELECT * FROM `uccp_curriculum` WHERE id= $id";
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
if(isset($_POST['hiddendataC'])){

$s = $_POST['hiddendataC'];
$sy = $_POST['sy'];
$course = $_POST['c'];
$year = $_POST['y'];
$subcode = $_POST['s'];
$description = $_POST['d'];
$units = $_POST['u'];
$sem = $_POST['se'];




$sql1 = "UPDATE `uccp_curriculum` SET `Schoolyear`='$sy',`Course`='$course',`Year`='$year',`Subcode`='$subcode',`Description`='$description',`Units`='$units',`Sem`='$sem' WHERE id=$s";
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
