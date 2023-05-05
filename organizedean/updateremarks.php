<?php

  include ("../include/config.php");



  if(isset($_POST['update'])){

    $ids =$_POST['update'];

    $sql = "SELECT * FROM `uccp_masterlist` WHERE id= $ids";
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



if(isset($_POST['hiddendataG'])){


$x = $_POST['hiddendataG'];
$remark = $_POST['updateRemarks'];



$sql1 = "UPDATE `uccp_masterlist` SET `remarks`='$remark' WHERE id='$x';";
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
