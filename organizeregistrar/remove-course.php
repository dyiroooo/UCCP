<?php
include('include/config.php');


if(isset($_POST['remove'])){

  $id = $_POST['remove'];

  $sql = "DELETE FROM `uccp_add_courses` WHERE id= $id";
  $result= mysqli_query($conn,$sql);
}


 ?>
