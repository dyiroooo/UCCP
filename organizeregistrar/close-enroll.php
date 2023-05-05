<?php
include('include/config.php');

  
  extract ($_POST);

  if(isset($_POST['close1'])){
    // $choices = $_POST['choices'];
    // $sql = mysqli_query($conn,"UPDATE `uccp_admission_schedule` SET status = 'Closed' WHERE status ='Open' OR status= '0'");
      $sql = mysqli_query($conn,"UPDATE `uccp_enrollment_schedule` SET status = 'Closed' WHERE status ='Open' ");
      // echo "<script> window.location='ENROLLMENT-SCHEDULING.php'</script>";


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

