<?php
include '../include/config.php';

$update_id = mysqli_real_escape_string($conn, $_POST['update_id']);
$price = mysqli_real_escape_string($conn, $_POST['updatePrice']);

$newvar = strval($update_id);

$select = "SELECT * FROM uccp_coursefee WHERE id = '" . $update_id . "' ";
$select_run = mysqli_query($conn, $select);

// if ($select == false) {
//     $query1 = "INSERT INTO uccp_coursefee (`type`, `price`, `totalprice`, `curriculumid`) VALUES ('', '$price', '', '$newvar')";
//     $query1_run = mysqli_query($conn, $query1);
// } else {
//     $query2 = "UPDATE uccp_coursefee SET price = '" . $price . "' WHERE 'curriculumid' = '" . $newvar . "' ";
//     $query2_run = mysqli_query($conn, $query2);
// }

$query1 = "INSERT INTO uccp_coursefee (`type`, `price`, `totalprice`, `curriculumid`) VALUES ('', '$price', '', '$update_id')";
$query1_run = mysqli_query($conn, $query1);

$query = "UPDATE uccp_approvedcurriculum SET Price='" . $price . "' WHERE id = '" . $update_id . "' ";
$query_run = mysqli_query($conn, $query);
