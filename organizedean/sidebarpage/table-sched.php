<?php
  include ("../include/config.php");



  $sql= "SELECT * FROM `uccp_sched`";
  $result = mysqli_query($conn,$sql);



  $rows = array();
  $data = array();
  while ($row = mysqli_fetch_array($result)) {


  $cys=  $row['courseyearsection'];
  $subcode=  $row['subjectcode'];
  $subname=  $row['subjectname'];
  $units=  $row['units'];
  $day=  $row['day'];
  $start=  $row['starttime'];
  $end=  $row['endtime'];
  $prof=  $row['professor'];
  $room=  $row['room'];


  $subarray= array();

    $subarray[]=  ' <td >'.$cys.'</td>';
    $subarray[]=  ' <td >'.$subcode.'<br> '.$subname.'</td>';
    $subarray[]=  ' <td >'.$units.'</td>';
    $subarray[]=  ' <td >'.$day.'</td>';
    $subarray[]=  ' <td >'.$start.'</td>';
    $subarray[]=  ' <td >'.$end.'</td>';
    $subarray[]=  ' <td >'.$prof.'</td>';
    $subarray[]=  ' <td >'.$room.'</td>';



  $subarray[]=   '  <td >
        <button class="btn btn-success" onclick="updatex('.$row['id'].')"><i class="fa-sharp fa-solid fa-pen"></i></button>
        <button class="btn btn-danger" onclick="deleteS('.$row['id'].')"><i class="fa-sharp fa-solid fa-trash"></i></button>

      </td>';



  $data[]=$subarray;
  }


  $output = array(
    'data'=>$data,


  );

  echo json_encode($output);










 ?>
