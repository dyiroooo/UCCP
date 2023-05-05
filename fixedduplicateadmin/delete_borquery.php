<?php
include 'dbcon.php';

$delborid = $_POST['borremove'];

$query = "DELETE FROM uccp_bor_tbl WHERE id = '$delborid' ";
$query_run = mysqli_query($con, $query);
 ?>
