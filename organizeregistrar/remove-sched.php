<?php

  include ("include/config.php");


$id = $_POST['remove'];

$query = "DELETE FROM `uccp_enrollment_schedule` WHERE id = '$id';";
mysqli_query($conn,$query);


 ?>
