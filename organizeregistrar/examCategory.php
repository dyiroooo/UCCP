<?php
include 'include/config.php';

$b_id = $_POST['batchid'];

$categoryquery = "SELECT * FROM uccp_examsched WHERE id = '$b_id' ";
$cqueryresult = mysqli_query($conn, $categoryquery);

$output = '<option disabled selected value="">Select Category</option>';

while ($row = mysqli_fetch_assoc($cqueryresult)) {
    $output .= '<option id="assignid" value="'.$row['id'].'">'.$row['category'].'</option>';
}

echo $output;

// echo $b_id;
?>
