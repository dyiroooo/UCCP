<?php
include 'include/config.php';

$size_id = $_POST['sizeid'];
// $size_id = '32';

$sizequery = "SELECT * FROM uccp_examsched WHERE id = '$size_id' ";
$sizequeryresult = mysqli_query($conn, $sizequery);

$output = '<option disabled selected value="">Select Size</option>';

while ($row = mysqli_fetch_assoc($sizequeryresult)) {
    $output .= '<option value="'.$row['id'].'">'.$row['size'].'</option>';
}

echo $output;

// echo $b_id;
?>
