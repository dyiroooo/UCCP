<?php

include('../include/config.php');

if(isset($_POST['update'])){
  $id = $_POST['update'];

  $sql = "SELECT * FROM `uccp_approvedcurriculum` WHERE id= $id";
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





if(isset($_POST['hiddendataA'])){
$s = $_POST['hiddendataA'];
$u = $_POST['u_availability'];






$sql1 = "UPDATE `uccp_approvedcurriculum` SET `availability`='$u' WHERE id=$s";
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