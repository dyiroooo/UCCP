<?php

include ("../include/config.php");


extract ($_POST);

if(isset($_POST['section'])){

  $sql = "INSERT INTO `uccp_section`(`course`, `year`, `section`, `courseyearsection`) VALUES ('$course','$year','$section','$course-$trim$section')";

  $results= mysqli_query($conn,$sql);

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
