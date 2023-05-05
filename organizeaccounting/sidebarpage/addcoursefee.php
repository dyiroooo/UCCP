<?php
include '../include/config.php';

//Add Fee
    $type = mysqli_real_escape_string($conn, $_POST['type']);
    $totalprice = mysqli_real_escape_string($conn, $_POST['totalprice']);

    $query = "INSERT INTO uccp_coursefee (type, price) VALUES ('$type','$totalprice')";
    $query_run = mysqli_query($conn, $query);
 ?>
