<?php
include 'dbcon.php';

$editadmin_id = mysqli_real_escape_string($con, $_POST['editadmin_id']);
$username = mysqli_real_escape_string($con, $_POST['edit_adminusername']);
$email = mysqli_real_escape_string($con, $_POST['edit_adminemail']);
$phone = mysqli_real_escape_string($con, $_POST['edit_adminphone']);

$query = "UPDATE uccp_adminacc_tbl SET username='".$username."', email='".$email."', phone='".$phone."' WHERE id = '".$editadmin_id."' ";
$query_run = mysqli_query($con, $query);
 ?>
