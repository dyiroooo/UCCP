<?php
include ("../include/config.php");



if(isset($_POST['x'])){

$course = $_POST['x'];






foreach ($_POST['values'] as $id) {

  $sql1 = "UPDATE `uccp_enrolled` SET `section`='$course' WHERE id='$id'";
  $results= mysqli_query($conn,$sql1);
  
  $sqlu = "UPDATE `uccp_studentinfo` SET `section`='$course' WHERE id='$id'";
  $results= mysqli_query($conn,$sqlu);
  
  $sql2 = "UPDATE `uccp_masterlist` SET `section`='$course' WHERE id='$id'";
  $results= mysqli_query($conn,$sql2);


}


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
