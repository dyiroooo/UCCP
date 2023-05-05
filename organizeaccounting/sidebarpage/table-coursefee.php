<?php

include('../include/config.php');

$query = "SELECT * FROM `uccp_coursefee`";
$query_run = mysqli_query($conn, $query);

$rows = array();
$data = array();
while ($row = mysqli_fetch_array($query_run)) {

  $id=  $row['id'];   
  $feetype=  $row['type'];
  $price = $row['price'];


$subarray= array();

$subarray[]=  '<tbody> 
                <td>' . $feetype .  '</td>';

$subarray[]=  '<td>' . $price .  '</td>';



$subarray[]= '<td >
<button type="button" id="' . $id .'" class="btn btn-success courseupdate"><i class="fa-sharp fa-solid fa-pen"></i></button>
<button type="button" id="' . $id .'" name="coursefeeremove" class="btn btn-danger deletedata"><i class="fa-sharp fa-solid fa-trash"></i></button>
</td> </tbody>';

$data[]=$subarray;
}

$output = array(
  'data'=>$data,
);
echo json_encode($output);
 ?>