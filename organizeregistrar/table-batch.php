<?php

include('include/config.php');

$query = mysqli_query($conn, "SELECT * FROM uccp_admission_schedule WHERE status = 'Open'");
$data = array();
while ($row1 = mysqli_fetch_array($query)) {
  $sy = $row1['schoolyear'];

  $sql= "SELECT * FROM `uccp_examsched` WHERE syexisting = '$sy' ORDER BY id DESC ";
  $result= mysqli_query($conn,$sql);

  $rows = array();
  while ($row = mysqli_fetch_array($result)) {

    $sy=  $row['syexisting'];
    $batch= $row['batch'];
    $cat=  $row['category'];
    $gwa = $row['gwarange'];
    // $sched = $row['schedule'];
    $sched = date('F d, Y', strtotime($row['schedule']));
    $room = $row['room'];
    $size = $row['size'];

    $subarray= array();

    $subarray[]=  '<tbody> <td > <b> Schoolyear:</b> '.$sy.'  <b> Batch: </b>'.$batch.'
                  <br>
                  <b>Category: </b>'.$cat.' <b>Average: </b> '.$gwa.'%
                  <br>
                  <b>Date: </b> '.$sched.' <b>Room: </b>'.$room.'
                  <b>Size: </b> '.$size.'
                  </td>';

    $subarray[]=     '  <td >
          <button class="btn btn-success" id="yow" data-id="'.$row['id'].'" data-bs-dismiss="modal" data-bs-target="#editBatch" ><i class="fa-sharp fa-solid fa-pen"></i></button>

        </td> </tbody>';

        // onclick="updateBatch('.$row['id'].')"

    $data[]=$subarray;
  }
}

$output = array(
  'data'=>$data,
);

echo json_encode($output);




 ?>
