<?php
include ("../include/config.php");


if(isset($_POST['update'])){
$id = $_POST['update'];

$sql = "SELECT * FROM `uccp_professor` WHERE id= $id";
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


if(isset($_POST['hiddendataP'])){


$x = $_POST['hiddendataP'];
$cc=$_POST['c'];
$gg=$_POST['g'];
$ee=$_POST['e'];
$aa=$_POST['a'];
$ff=$_POST['f'];
$fcc=$_POST['fc'];


$sql1 = "UPDATE `uccp_professor` SET `fullname`='$ff',`contact`='$cc',`email`='$ee',`gender`='$gg',`address`='$aa',`faculty`='$fcc' WHERE id=$x";
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
