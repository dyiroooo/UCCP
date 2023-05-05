<?php

  include ("../include/config.php");


if(isset($_POST['update'])){
  $id = $_POST['update'];

  $sql = "SELECT * FROM uccp_section WHERE id= $id";
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

if(isset($_POST['hiddendataS'])){

$s = $_POST['hiddendataS'];

$course = $_POST['c'];
$year = $_POST['y'];
$section = $_POST['s'];
$cys = $_POST['cys'];





$sql1 = "UPDATE `uccp_section` SET `course`='$course',`year`='$year',`section`='$section',`courseyearsection`='$cys' WHERE id=$s";
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
