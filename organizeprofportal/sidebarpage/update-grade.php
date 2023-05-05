<?php

  include ("../include/config.php");


if(isset($_POST['update'])){
  $id = $_POST['update'];

  $sql = "SELECT * FROM uccp_grading WHERE id= $id";
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

if(isset($_POST['hiddendataG'])){

$s = $_POST['hiddendataG'];

$finals = $_POST['f'];
$midterm = $_POST['m'];
$name = $_POST['name'];
$cys = $_POST['cys'];

$average = $_POST['a'];


$avg = $midterm + $finals;
$average = $avg /2;

      if ($average >=4) {
        $remarks = 'Failed';
      }else{
        $remarks ='Passed';
      }


$sql1 = "UPDATE `uccp_grading` SET `midterm`='$midterm',`finals`='$finals',`remarks`='$remarks', `average`='$average' WHERE id=$s";
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
