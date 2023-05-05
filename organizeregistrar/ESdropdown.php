<?php

include ("include/config.php");

$output = '';

$output.= '<select class="form-control" name="" id="cyss" >
<option value="" id="op">Select</option> ';

$existingsy = "SELECT * FROM uccp_admission_schedule WHERE status = 'Open' ";
$resultsy = mysqli_query($conn, $existingsy);

while ($r = mysqli_fetch_array($resultsy)) {
  $year = $r['schoolyear'];

  $sql = "SELECT * FROM uccp_examsched WHERE syexisting = '$year' ORDER BY id DESC ";
  // $sql = "SELECT * FROM uccp_examsched";
  $results = mysqli_query($conn, $sql);

  if (mysqli_num_rows($results)>0) {
    while ($row = mysqli_fetch_assoc($results)) {
      $results = mysqli_query($conn,$sql);
           while($r = mysqli_fetch_assoc($results)){

                $output.= '<option>'.$r['category'].'</option>';

            }

            $output.='</select>';
    }
  }
  }





echo $output;



  ?>
