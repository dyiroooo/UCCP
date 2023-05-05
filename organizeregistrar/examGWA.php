<?php
include 'include/config.php';

$c_id = $_POST['categoryid'];

$gwaquery = "SELECT * FROM uccp_examsched WHERE id = '$c_id' ";
$gwaqueryresult = mysqli_query($conn, $gwaquery);

$output = '<option disabled selected value="">Select GWA Range</option>';

while ($row = mysqli_fetch_assoc($gwaqueryresult)) {
    $output .= '<option value="'.$row['id'].'">'.$row['gwarange'].'</option>';
}

echo $output;

// echo $b_id;
?>
