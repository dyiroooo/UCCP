<?php

include('../include/config.php');

if(isset($_POST['update'])){
  $id = $_POST['update'];

  $sql = "SELECT * FROM `uccp_approvedcurriculum` WHERE id= $id";
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





if(isset($_POST['hiddendataA'])){
$s = $_POST['hiddendataA'];
$u = $_POST['u_availability'];
$c = $_POST['u_course'];
$y= $_POST['u_year'];
$units= $_POST['u_units'];
$sem= $_POST['u_sem'];



$sqlz = "SELECT  SUM(units) AS total_units FROM uccp_approvedcurriculum WHERE course='$c' and availability='Accredit' and Year='$y' and Sem= '$sem'";

$result= mysqli_query($conn,$sqlz);

while($row = mysqli_fetch_assoc($result)){
 
  $total_units = $row['total_units'];
  

  

  $prev= $units + $total_units;


  if ($total_units > 27) {
    $data = array(
        'status' => 'failed',
        'message' => 'Units are exceeded!'
    );
    echo json_encode($data);
} else if ($u == "Clear" && $prev > 27){
    // Update the table
    $sql5 = "UPDATE `uccp_approvedcurriculum` SET `availability`='$u' WHERE id=$s";
    $results= mysqli_query($conn,$sql5);


    if($sql5 == true){
        $data = array(
            'status'=>'success',
        );
        echo json_encode($data);
    } else {
        $data = array(
            'status'=>'failed',
            'message' => 'Update failed'
        );
        echo json_encode($data);
    }
}else if($prev > 27){

  $data = array(
    'status' => 'failed',
    'message' => 'Units are exceeded!'
);
echo json_encode($data);
}


else {
  // Update the table
  $sql1 = "UPDATE `uccp_approvedcurriculum` SET `availability`='$u' WHERE id=$s";
  $results= mysqli_query($conn,$sql1);


  if($sql1 == true){
      $data = array(
          'status'=>'success',
      );
      echo json_encode($data);
  } else {
      $data = array(
          'status'=>'failed',
          'message' => 'Update failed'
      );
      echo json_encode($data);
  }
}

  
}



// $sql1 = "UPDATE `uccp_approvedcurriculum` SET `availability`='$u' WHERE id=$s";
// $results= mysqli_query($conn,$sql1);


// if($sql1 == true){

//   $data = array(
//     'status'=>'success',
//   );
//   echo json_encode($data);
// }else {

//   $data = array(
//     'status'=>'failed',
//   );
//   echo json_encode($data);
// }
}
 
?>