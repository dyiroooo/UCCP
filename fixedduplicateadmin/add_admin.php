<?php
include 'dbcon.php';

$usertype = 6; //6 is admin's user category or type
$username = mysqli_real_escape_string($con, $_POST['username']);
$password = mysqli_real_escape_string($con, $_POST['password']);
$email = mysqli_real_escape_string($con, $_POST['email']);
$phone = mysqli_real_escape_string($con, $_POST['phone']);

$query = "INSERT INTO uccp_adminacc_tbl (usertype, username, password, email, phone) VALUES ('$usertype', '$username', '$password', '$email', '$phone')";
$query_run = mysqli_query($con, $query);
 ?>
