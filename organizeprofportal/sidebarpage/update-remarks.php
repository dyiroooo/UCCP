<?php

  include ("../include/config.php");

if(isset($_POST['x'])){


$x = $_POST['x'];
$remark = $_POST['b'];



$sql1 = "UPDATE `uccp_grading` SET `remarks`='$remark' WHERE id='$x';";
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
