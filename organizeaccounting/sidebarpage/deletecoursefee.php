<?php
include '../include/config.php';

$delete_id = $_POST['deletedetails'];

$query = "DELETE FROM uccp_coursefee WHERE id = '$delete_id' ";
$query_run = mysqli_query($conn, $query);
 ?>
