<?php
include '../include/config.php';

$update_id = mysqli_real_escape_string($conn, $_POST['update_id']);
$type = mysqli_real_escape_string($conn, $_POST['update_type']);
$c_id = mysqli_real_escape_string($conn, $_POST['update_curriculumid']);
// $courses = mysqli_real_escape_string($conn, $_POST['update_course']);
// $yearlevel = mysqli_real_escape_string($conn, $_POST['update_yearlevel']);
$totalprice = mysqli_real_escape_string($conn, $_POST['update_totalprice']);

$query = "UPDATE uccp_coursefee SET type='" . $type . "', price='" . $totalprice . "' WHERE id = '" . $update_id . "' ";
$query_run = mysqli_query($conn, $query);

$query1 = "UPDATE uccp_approvedcurriculum SET Price = '" . $totalprice . "' WHERE id = '" . $c_id . "' ";
$query1_run = mysqli_query($conn, $query1);
