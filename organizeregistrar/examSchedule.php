<?php
include 'include/config.php';

$sched_id = $_POST['gwaid'];

$schedquery = "SELECT * FROM uccp_examsched WHERE id = '$sched_id' ";
$schedqueryresult = mysqli_query($conn, $schedquery);

$output = '<option disabled selected value="">Select Schedule</option>';

while ($row = mysqli_fetch_assoc($schedqueryresult)) {
    $output .= '<option value="'.$row['id'].'">'.$row['schedule'].'</option>';
}

echo $output;

// echo $b_id;
?>
