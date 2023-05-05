<?php
include 'include/config.php';
// syid = school year id
$syid = $_POST['syid'];

// echo $syid;
$batchquery = "SELECT * FROM uccp_examsched WHERE syexisting = '$syid' AND size != usercount ORDER BY id DESC";
$batchqueryresult = mysqli_query($conn, $batchquery);

$output = '<option disabled selected value="">Select Batch</option>';

while ($row = mysqli_fetch_assoc($batchqueryresult)) {
    $output .= '<option value="'.$row['id'].'">'.$row['batch'].'</option>';
}

echo $output;
?>
