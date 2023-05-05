<?php
include ('include/config.php');

$count_query = mysqli_query($conn, "SELECT COUNT(*) as count FROM uccp_admission_schedule WHERE status = 'Open'");
$count_result = mysqli_fetch_assoc($count_query);
$count = $count_result['count'];

echo $count;
?>
