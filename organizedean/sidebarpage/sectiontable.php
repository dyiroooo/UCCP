
 <?php

include ("../include/config.php");


$result = mysqli_query($conn,"SELECT * FROM `uccp_section`");

$rows = array();
$data = array();
while ($row = mysqli_fetch_array($result)) {

  $id = $row['id'];
  $course = $row['course'];
  $year = $row['year'];
  $section = $row['section'];
  $cys = $row['courseyearsection'];


$subarray= array();

   $subarray[]= '<td>'.$course.'</td>';
   $subarray[]= '<td>'.$year.'</td>';
   $subarray[]= '<td>'.$section.'</td>';
   $subarray[]= '<td>'.$cys.' </td>';

$subarray[]=   '  <td>


    <button class="btn btn-success" onclick="updateSS('.$row['id'].')"><i class="fa-sharp fa-solid fa-pen"></i></button>
    <button class="btn btn-danger" onclick="removeS('.$row['id'].')"><i class="fa-sharp fa-solid fa-trash"></i></button>


    </td>';



$data[]=$subarray;
}


$output = array(
  'data'=>$data,


);

echo json_encode($output);


  ?>
