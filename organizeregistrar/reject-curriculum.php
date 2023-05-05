<?php

include ("include/config.php");

if(isset($_POST['removeR'])){

  $id = $_POST['removeR'];

  $sql = "UPDATE `uccp_curriculum` SET `Status`='REJECT' WHERE id=$id";
  $result= mysqli_query($conn,$sql);

  if($sql == true){

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
