<?php
include('include/config.php');

  
  extract ($_POST);

  if(isset($_POST['choice'])){
    
    $choices = $_POST['choice'];

    $sql = mysqli_query($conn,"UPDATE `uccp_admission_schedule` SET status = 'Closed' WHERE status = 'Open'");
    $sql = mysqli_query($conn,"UPDATE `uccp_admission_schedule` SET status = 'Open' WHERE schoolyear ='$choices'");
    

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



