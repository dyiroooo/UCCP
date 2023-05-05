<?php

include('include/config.php');


if(isset($_POST['s'])){

$sy = $_POST['s'];

$table ='
<div class="table-responsive-lg">
<table class="table text-center table-bordered " >
  <thead>
  <tr>
      <th>NAME</th>
      <th>GENDER</th>
      <th>EMAIL</th>
      <th>PHONE</th>
      <th>COURSE</th>
      <th>YEAR</th>
      <th>SEM</th>
      <th>SCHOOLYEAR</th>
  </tr>

  </thead>';

$sql= "SELECT * FROM `uccp_enrolled` WHERE schoolyear='$sy';";
$result= mysqli_query($conn,$sql);

  while($row = mysqli_fetch_assoc($result)){

    $id = $row['id'];
    $name= $row['name'];
    $gender= $row['gender'];
    $email= $row['email'];
    $phone= $row['phone'];
    $course = $row['course'];
    $year= $row['year'];
    $schoolyear= $row['schoolyear'];
    $sem= $row['sem'];

      $table.='
          <tr id="row<?php echo '.$id.' ?>">
            <td>'.$name.'</td>
            <td>'.$gender.'</td>
            <td>'.$email.'</td>
            <td>'.$phone.'</td>
            <td>'.$course.'</td>
            <td>'.$year.'</td>
            <td>'.$sem.'</td>
            <td>'.$schoolyear.'</td>
          </tr>';
  }

$table.='</table> </div>';
echo $table;

}

 ?>
