<?php
include '../include/config.php';

$delete_id = $_POST['deletedetails'];
$deletec_id = $_POST['deletecid'];

$query = "DELETE FROM uccp_coursefee WHERE id = '$delete_id' ";
$query_run = mysqli_query($conn, $query);

$query1 = "DELETE FROM uccp_coursefee WHERE curriculumid = '$deletec_id' ";
$query1_run = mysqli_query($conn, $query1);

$query2 = "UPDATE uccp_approvedcurriculum SET Price = '' WHERE id = '$deletec_id' ";
$query2_run = mysqli_query($conn, $query2);
