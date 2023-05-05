<?php
include ("include/config.php");


$id = $_POST['remove'];

$query = "DELETE FROM `uccp_studentinfo` WHERE id = '$id';";
mysqli_query($conn,$query);

if($query == true){

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


 ?>
