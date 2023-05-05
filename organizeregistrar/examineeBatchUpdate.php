<?php
include ("include/config.php");

// if (isset($_POST['batch1']) && isset($_POST['category1']) && isset($_POST['gwa1']) && isset($_POST['sched1']) && isset($_POST['room1'])) {
  $batch = $_POST['batch1'];
  $category = $_POST['category1'];
  $gwa = $_POST['gwa1'];
  $sched = $_POST['sched1'];
  $room = $_POST['room1'];
  $size = $_POST['size1'];
  $syexisting = $_POST['syexisting1'];
  $assignid = $_POST['assignid1'];
  // $sid = $_POST['values'];

  // foreach ($_POST['values1'] as $id) {
  //   $sql1 = "UPDATE uccp_examinees SET 'batch' = '$batch', 'category' = '$category', 'gwarange' = '$gwa', 'schedule' = '$sched', 'room' = '$room' WHERE id ='$id' ";
  //   $queryresult = mysqli_query($conn, $sql1);
  // }

  $counter = 0;

foreach ($_POST['values'] as $id) {

  $sql1 = "UPDATE uccp_examinees SET batch = '$batch', category = '$category', gwarange = '$gwa', schedule = '$sched', room = '$room', size='$size', syexisting='$syexisting', schedid='$assignid' WHERE id = $id";
  $results= mysqli_query($conn,$sql1);

  $counter++;
}

$select = "SELECT usercount AS count_user FROM uccp_examsched WHERE id = $assignid";
$s1 = mysqli_query($conn,$select);

while ($sqlrow = mysqli_fetch_assoc($s1)) {
  $while = $sqlrow['count_user'];
}
$new = $counter + $while;

$update = "UPDATE uccp_examsched SET usercount = '$new' WHERE id = $assignid";
$updateresult = mysqli_query($conn, $update);

  if($sql1 == true){

    $data = array(
      'status'=>'success',
    );
    echo json_encode($data);
  }else {

    $data = array(
      'status'=>'failed',
    );
    echo json_encode($data);
  }
// }
 ?>
