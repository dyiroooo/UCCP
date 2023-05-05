<?php
include '../include/config.php';

$update_id = mysqli_real_escape_string($conn, $_POST['update_id']);
$type = mysqli_real_escape_string($conn, $_POST['update_type']);
// $courses = mysqli_real_escape_string($conn, $_POST['update_course']);
// $yearlevel = mysqli_real_escape_string($conn, $_POST['update_yearlevel']);
$totalprice = mysqli_real_escape_string($conn, $_POST['update_totalprice']);

$query = "UPDATE uccp_coursefee SET type='".$type."', price='".$totalprice."' WHERE id = '".$update_id."' ";
$query_run = mysqli_query($conn, $query);
 ?>
