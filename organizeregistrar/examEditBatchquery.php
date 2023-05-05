<?php
include ('include/config.php');

$editID = $_POST['id'];
$editBatchNo = $_POST['batch'];
$editCategory = $_POST['category'];
$editGWA = $_POST['gwa'];
$editSched = $_POST['sched'];
$editRoom = $_POST['room'];
$editSize = $_POST['size'];
// $schedid = $_POST['ESid'];

$query = "UPDATE uccp_examsched SET batch='$editBatchNo', category='$editCategory', gwarange='$editGWA', schedule='$editSched', room='$editRoom', size='$editSize' WHERE id = '$editID' ";
$query_run = mysqli_query($conn, $query);

$query1 = "UPDATE uccp_examinees SET batch='$editBatchNo', category='$editCategory', gwarange='$editGWA', schedule='$editSched', room='$editRoom', size='$editSize' WHERE schedid = '$editID' ";
$query_run1 = mysqli_query($conn, $query1);

// $query = "UPDATE uccp_examsched SET batch='2020', category='3030', gwarange='2020', schedule='2030', room='630', size='5000' ";
// $query_run = mysqli_query($conn, $query);


?>
