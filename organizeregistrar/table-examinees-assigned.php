<?php
include ('include/config.php');

$query = mysqli_query($conn, "SELECT * FROM uccp_admission_schedule WHERE status = 'Open'");
$data = array(); // Define the $data variable outside the while loop
while ($row1 = mysqli_fetch_array($query)) {
  $sy = $row1['schoolyear'];

  $result = mysqli_query($conn,"SELECT * FROM `uccp_examinees` WHERE Schoolyear = '$sy' AND NOT batch = '' ");

  $rows = array();
  while($row = mysqli_fetch_array($result)){
      $id = $row['id'];
      $name = $row['Name'];
      // $bday = $row['Birthday'];
      $sched = date('F d, Y', strtotime($row['schedule']));
      $category = $row['category'];
      $syexisting = $row['Schoolyear'];
      $gwarange = $row['gwarange'];

      $subarray = array();

      $subarray[]= '<td><input type="checkbox" name="selector[]" class ="checkOne" value='.$id.'></td>';

      $subarray[]="<td><strong>$name</strong>

      <small style='display: none'><b>Year Applied:</b> $syexisting </small>
      <br>
      <small><b>Category:</b> $category </small>
      <br><small title='School Year they Admitted'><b>S.Y Admitted:</b> $syexisting</small>
      <br>
      <small><b>GWA Range:</b> $gwarange
        <br>
        <b>Schedule: </b>$sched
      </small>
      </td>";

      $subarray[]="<td class='text-center' valign='center'>
      <button onclick='accept(".$row['id'].")' class='btn btn-success'><i class='fa-sharp fa-solid fa-check'></i></button>
      <button onclick='email(".$row['id'].")' class='btn btn-info'><i class='fa-solid fa-envelope'></i></button>
      </td>";

      $data[]=$subarray;
  }
}
$output = array(
    'data'=>$data,
);

echo json_encode($output);

?>
