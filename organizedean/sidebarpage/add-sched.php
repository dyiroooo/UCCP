<?php
  include ("../include/config.php");

  extract ($_POST);
  if(isset($_POST['cys'])){





    $sql = "INSERT INTO `uccp_sched`(`courseyearsection`, `subjectcode`, `subjectname`, `units`, `day`, `starttime`, `endtime`, `professor`, `room`) 
    VALUES ('$cys','$subcode','$subname','$units','$day','$starttime','$endtime','$professor','$room')";
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
