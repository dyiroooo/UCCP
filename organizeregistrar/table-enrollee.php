<?php

  include ("include/config.php");


if(isset($_POST['display'])){

$table ='
<div class="table-responsive-lg">
<table class="  table text-center table-hover table-bordered " >
  <thead class = "text-center">

   <tr>
      <th>STUDENT INFO</th>
      <th>COURSE DETAILS</th>
      <th colspan="4">OPERATIONS</th>

  </tr>


  </thead>';


$sql= "SELECT * FROM `uccp_enrollee`";
$result= mysqli_query($conn,$sql);

  while($row = mysqli_fetch_assoc($result)){

    $id = $row['id'];
    $name= $row['name'];
    $gender= $row['gender'];
    $birthday= $row['birthday'];
    $email= $row['email'];
    $phone= $row['phone'];
    $course = $row['course'];
    $year= $row['year'];
    $schoolyear= $row['schoolyear'];
    $sem= $row['sem'];

      $table.='
           <tr align="justify" id="row<?php echo '.$id.' ?>">
            <td><strong>'.$name.'</strong> <br> <small> '.$gender.' <br> '.$birthday.' <br> '.$email.' <br>'.$phone.' </small> </td>
            <td>'.$course.' <br> '.$year.' <br>'.$sem.'<br> '.$schoolyear.'</td>

              <td class = "text-center"><button class="Requirements btn btn-success" onclick="view1('.$id.')"><i class="fa-solid fa-eye"></i></button>
                <button class="btn btn-primary" onclick="accept1('.$id.')"><i class="fa-sharp fa-solid fa-check-to-slot"></i></button>
             <button class="btn btn-danger" onclick="reject1('.$id.')"><i class="fa-solid fa-trash"></i></button></td>

          </tr>';
  }

$table.='</table> </div>';
echo $table;

}

 ?>
