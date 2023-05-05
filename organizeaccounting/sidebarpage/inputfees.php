<?php
include '../include/config.php';

if(isset($_POST['data'])){
  $t= $_POST['type'];
  $id = $_POST['data'];
  $p = $_POST['price'];
  $q = $_POST['ornumber_id'];

  $sql1 = "SELECT * FROM `uccp_admission_billing` WHERE id ='$id';";
  $result = mysqli_query($conn,$sql1);

  $sqls ="UPDATE `uccp_admission_billing` SET type = '$t', price = '$p', ornumber = '$q' WHERE id= '$id';";
  $results = mysqli_query($conn,$sqls);
}

 ?>
