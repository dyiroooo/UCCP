<?php
include('include/config.php');

if(isset($_POST['batchno'])){

  extract ($_POST);


$query = "INSERT INTO uccp_examsched (`batch`, `category`, `gwarange`, `schedule`, `room`, `syexisting`, `size` ) VALUES ('$batchno', '$category', '$gwarange', '$sched','$room', '$exsy', '$size')";
$result = mysqli_query($conn, $query);

 if($query== true){

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
}
?>
