<?php
include 'dbcon.php';

$delhtid = $_POST['htremove'];

$query = "DELETE FROM uccp_ht_tbl WHERE id = '$delhtid' ";
$query_run = mysqli_query($con, $query);
 ?>
