<?php
  include ("../include/config.php");



    extract ($_POST);

  if(isset($_POST['schoolyear'])){





    $sql = "INSERT INTO uccp_curriculum (`Schoolyear`,`Course`,`Year`,`Subcode`,`Description`,`Units`,`Status`,`Sem`) VALUES ('$schoolyear','$course','$year','$subcode','$description','$units','PENDING','$sem')";
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
