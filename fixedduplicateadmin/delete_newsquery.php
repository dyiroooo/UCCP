<?php
include 'dbcon.php';

$delnewsid = $_POST['newsremove'];

$query = "DELETE FROM uccp_news_tbl WHERE id = '$delnewsid' ";
$query_run = mysqli_query($con, $query);
 ?>
