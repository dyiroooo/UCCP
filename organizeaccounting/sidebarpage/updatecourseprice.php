<?php
include '../include/config.php';

$update_id = mysqli_real_escape_string($conn, $_POST['update_id']);
$price = mysqli_real_escape_string($conn, $_POST['updatePrice']);

$query = "UPDATE uccp_approvedcurriculum SET Price='".$price."' WHERE id = '".$update_id."' ";
$query_run = mysqli_query($conn, $query);
 ?>
