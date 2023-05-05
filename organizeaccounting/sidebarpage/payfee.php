<?php
include '../include/config.php';

if(isset($_POST['id'])){

  $id = $_POST['id'];
  $payfee = $_POST['payfees'];
  $balance = $_POST['update'];

  $sql1 = "SELECT * FROM `uccp_enrollment_billing` WHERE id ='$id';";
  $result = mysqli_query($conn,$sql1);

  $sql4 = "UPDATE `uccp_enrollment_billing` SET payable_fee = '$payfee'  WHERE id = '$id';";
  mysqli_query($conn,$sql4);

  $sql3 = "UPDATE `uccp_enrollment_billing` SET balance = '$balance'  WHERE id = '$id';";
  mysqli_query($conn,$sql3);

}
 ?>
