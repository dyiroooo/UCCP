<?php

include('include/config.php');

$query = "SELECT * FROM `uccp_approvedcurriculum`";
$query_run = mysqli_query($conn, $query);

$rows = array();
$data = array();
while ($row = mysqli_fetch_array($query_run)) {

  $id =  $row['id'];
  $subcode =  $row['Subcode'];
  $schoolyear = $row['Schoolyear'];
  $description = $row['Description'];
  $course = $row['Course'];
  $price = $row['Price'];


  $subarray = array();

  $subarray[] =  '<tbody> 
                <td>' . $subcode .  '</td>';

  $subarray[] = '<td>' . $price .  '</td>';

  $subarray[] =  '<td>' . $description .  '</td>';

  $subarray[] =  '<td>' . $schoolyear .  '</td>';
  $subarray[] =  '<td>' . $course .  '</td>';


  $subarray[] = '
<td>
<button type="button" id="' . $id . '" class="btn btn-success updateCourseprice"><i class="fa-sharp fa-solid fa-pen"></i></button>
</td> 
</tbody>
';

  $data[] = $subarray;
}

$output = array(
  'data' => $data,
);
echo json_encode($output);
