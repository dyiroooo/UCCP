<?php
include '../include/config.php';

 if(isset($_POST['id'])){

  $id = $_POST['id'];
  $ornumber = $_POST['orenumber_id'];
  $feetype = $_POST['feetypes'];
  $price = $_POST['price'];
  $totalprice = $_POST['totalprice'];

  $sql1 = "SELECT * FROM `uccp_enrollment_billing` WHERE id ='$id';";
  $result = mysqli_query($conn,$sql1);

  $sql2 ="UPDATE `uccp_enrollment_billing` SET totalprice = '$totalprice', ornumber = '$ornumber', price = '$price', feetype = '$feetype' WHERE id= '$id'; ";
  $results = mysqli_query($conn,$sql2);

  $sql3 = "UPDATE `uccp_enrollment_billing` SET balance = '$totalprice'  WHERE id = '$id';";
  mysqli_query($conn,$sql3);

  $sql3 = "UPDATE `uccp_enrollment_billing` SET payable_fee = '0'  WHERE id = '$id';";
  mysqli_query($conn,$sql3);

}
 ?>
