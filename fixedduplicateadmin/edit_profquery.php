<?php
include 'dbcon.php';

$editprofessor_id = mysqli_real_escape_string($con, $_POST['profid']);
$username = mysqli_real_escape_string($con, $_POST['profuser']);
$password = mysqli_real_escape_string($con, $_POST['profpass']);


$query = "UPDATE `uccp_professor` SET username = '".$username."', password = '".$password."' WHERE id = '".$editprofessor_id."'";
$query_run = mysqli_query($con, $query);

$query1 = "UPDATE uccp_login SET Password='".$password."', Username = '".$username."' WHERE id = '".$editprofessor_id."'";
$query_run1 = mysqli_query($con, $query1);

$query2 = "UPDATE uccp_sched SET professor='".$name."' WHERE id = '".$editprofessor_id."'";
$query_run2 = mysqli_query($con, $query2);
 ?>
