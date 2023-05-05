<?php
include 'include/config.php';

$room_id = $_POST['roomid'];

$roomquery = "SELECT * FROM uccp_examsched WHERE id = '$room_id' ";
$roomqueryresult = mysqli_query($conn, $roomquery);

$output = '<option disabled selected value="">Select Room</option>';

while ($row = mysqli_fetch_assoc($roomqueryresult)) {
    $output .= '<option value="'.$row['id'].'">'.$row['room'].'</option>';
}

echo $output;

// echo $b_id;
?>
