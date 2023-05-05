<?php


include ("../include/config.php");


if(isset($_POST['deleteS'])){

  $id = $_POST['deleteS'];

  $sql = "DELETE FROM `uccp_sched` WHERE id= $id";
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
