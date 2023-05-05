<?php
  include ("../include/config.php");



    extract ($_POST);
$fname = $_POST['fname'];
$mname = $_POST['mname'];
$lname = $_POST['lname'];

    $fullname= $fname." ".$mname." ".$lname;

    $sql = "INSERT INTO `uccp_professor`(`fullname`,`address`, `email`, `gender`, `contact`, `faculty`,`account_type`,`username`,`password`) VALUES ('$fullname','$address','$email','$gender','$contact','$faculty','2','$email','$fullname')";
    $result= mysqli_query($conn,$sql);
    
      $q = "INSERT INTO `uccp_login`(`id`, `Username`,`Password`,`Email`,`Usertype`,`otp`) SELECT  `id`, `email`, `fullname`, `email`,`account_type`,'' FROM `uccp_professor` WHERE Username='$email'";
         mysqli_query($conn,$q);

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
