<?php
include 'dbcon.php';

$delxoid = $_POST['xoremove'];

$query = "DELETE FROM uccp_xo_tbl WHERE id = '$delxoid' ";
$query_run = mysqli_query($con, $query);
 ?>
