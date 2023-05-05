<?php

include('../include/config.php');

$query = "SELECT * FROM `uccp_admission_billing`";
$query_run = mysqli_query($conn, $query);

$rows = array();
$data = array();
while ($row = mysqli_fetch_array($query_run)) {

  $id=  $row['id'];
  $name=  $row['Name'];
  $feetype = $row['type'];
  $price = $row['price'];
  $ornumber = $row['ornumber'];

$subarray= array();

$subarray[]=  '<tbody> 
                <td>' . $name .  '</td>';

$subarray[]=  '<td>' . $feetype .  '</td>';

$subarray[]=  '<td>' . $price .  '</td>';

$subarray[]=  '<td>' . $ornumber .  '</td>';

$subarray[]= '<td >
<button type="button" data-id="' . $id . '?>" class="btn btn-info  inputfees"><i class="fa-sharp fa-solid fa-pen"></i></button>
<button type="button" id="adbills" data-id = "' . $id . '" class="btn btn-success adprint" data-bs-toggle="modal" data-bs-target="#addbill"><i class="fa-sharp fa-solid fa-print"></i></button>
<button type = "button" id = "'. $id . '" class="btn btn-primary acceptapplicant"><i class="fa-sharp fa-solid fa-check"></i></button>
</td> </tbody>';

$data[]=$subarray;
}

$output = array(
  'data'=>$data,
);
echo json_encode($output);
 ?>