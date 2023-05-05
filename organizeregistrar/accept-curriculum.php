<?php


  include ("include/config.php");

if(isset($_POST['acceptR'])){

$id = $_POST['acceptR'];

$sql = "UPDATE `uccp_curriculum` SET `Status`='APPROVED' WHERE id=$id";
$result= mysqli_query($conn,$sql);

  $sql1= " INSERT INTO `uccp_approvedcurriculum`(`id`, `Schoolyear`, `Course`, `Year`, `Subcode`, `Description`, `Units`, `Status`,`Sem`, `availability`) SELECT
  `id`, `Schoolyear`, `Course`, `Year`, `Subcode`, `Description`, `Units`, `Status`,`Sem`,'' FROM uccp_curriculum WHERE id='$id';";
  $result= mysqli_query($conn,$sql1);



  $sql2 = "DELETE FROM `uccp_curriculum` WHERE id=$id";
  $result= mysqli_query($conn,$sql2);


  if($sql2 == true){

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
