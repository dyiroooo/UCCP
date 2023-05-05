<?php

include('../include/config.php');

$query = "SELECT * FROM `uccp_enrollment_billing`";
$query_run = mysqli_query($conn, $query);

$rows = array();
$data = array();
while ($row = mysqli_fetch_array($query_run)) {

  $id=  $row['id'];
  $name=  $row['name'];
  $course= $row['course'];
  $year=  $row['year'];
  $ornumber = $row['ornumber'];
  $totalprice = $row['totalprice'];
  $payablefee = $row['payable_fee'];
  $balance = $row['balance'];

$subarray= array();

$subarray[]=  '<tbody> 
                <td>' . $name .  '</td>';

$subarray[]=  '<td>' . $course .  '</td>';
 
 $subarray[]=  '<td>' . $year .  '</td>';

 $subarray[]=  '<td>' . $ornumber .  '</td>';

$subarray[]=  '<td>' . $totalprice .  '</td>';

$subarray[]=  '<td>' . $payablefee .  '</td>';

$subarray[]=  '<td>' . $balance .  '</td>';


$subarray[]= '<td >
<button type="button" data-id="'. $id . '" class="btn btn-info inputpayfees"><i class="fa-sharp fa-solid fa-pen"></i></button>
</td> </tbody>';

$data[]=$subarray;
}

$output = array(
  'data'=>$data,
);
echo json_encode($output);
 ?>