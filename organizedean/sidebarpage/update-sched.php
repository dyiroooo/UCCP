<?php
include ("../include/config.php");


if(isset($_POST['update'])){
$id = $_POST['update'];

$sql = "SELECT * FROM `uccp_sched` WHERE id= $id";
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

if(isset($_POST['hiddendataSched'])){

$x = $_POST['hiddendataSched'];

$course = $_POST['course'];
$room = $_POST['room'];
$prof = $_POST['prof'];
$et = $_POST['et'];
$st = $_POST['st'];
$day = $_POST['day'];
$units = $_POST['units'];
$subname = $_POST['subname'];
$subcode = $_POST['subcode'];




$sql1 = "UPDATE `uccp_sched` SET `courseyearsection`='$course',`room`='$room',`professor`='$prof'
,`endtime`='$et',`starttime`='$st',`day`='$day',`units`='$units',`subjectname`='$subname',`subjectcode`='$subcode'  WHERE id='$x';";

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
