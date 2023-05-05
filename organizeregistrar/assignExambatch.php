<?php
include ("include/config.php");

if (isset($_POST['x'])) {

    $examinee = $_POST['x'];

    foreach ($_POST['values'] as $id) {
        $query = "UPDATE uccp_examinee SET 'batch'='$batch', 'category'='$category', 'gwarange'='$gwarange', 'schedule'='$schedule', 'room'='$room', 'syexisting'='$syexisting', 'size'='$size'; WHERE id='' ";
        $queryresult = mysqli_query($conn, $query);
    }

    if ($query == true) {
        $data. array(
            'status'=>'success',
        );
    } else {
        $data = array(
            'status' => 'failed',
        );
        echo json_encode($data);
    }
}
?>
