<?php
include 'dbcon.php';

$deladminid = $_POST['adminremove'];

$query = "DELETE FROM uccp_adminacc_tbl WHERE id = '$deladminid' ";
$query_run = mysqli_query($con, $query);
 ?>
