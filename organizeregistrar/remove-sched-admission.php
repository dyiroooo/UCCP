<?php

  include ("include/config.php");


$id = $_POST['remove'];

$query = "DELETE FROM `uccp_admission_schedule` WHERE id = '$id';";
mysqli_query($conn,$query);


 ?>
