<?php

  include ("include/config.php");


if(isset($_POST['display'])){

  $table ='
  <div class="table-responsive-lg">
    <table class="  table text-center table-hover cell-border table-bordered " id= "enrolltbl">
      <thead>
        <tr align = "center">


          <th>SCHOOL YEAR</th>
          <th>SEM</th>
          <th>STATUS</th>
          <th>ACTION</th>


        </tr>
      </thead>';


      $sql= "SELECT * FROM `uccp_enrollment_schedule`";
      $result = mysqli_query($conn,$sql);


    while($row = mysqli_fetch_array($result)){

      $id = $row['id'];
      $status = $row['status'];
      $sem= $row['sem'];
      $sy= $row['schoolyear'];

        $table.='

            <tr id="row<?php echo '.$id.' ?>">
                  <td>'.$sy.'</td>
                  <td>'.$sem.'</td>
                  <td><strong>'.$status.'</strong></td>
                    <td>
                    <button  class="edit btn btn-success" onclick="edit1('.$id.')"><i class="fa-sharp fa-solid fa-pen"></i></button>
                    <button onclick="remove1('.$id.')" class="btn btn-danger"><i class="fa-sharp fa-solid fa-trash"></i></button></td>
              </tr>




            ';
    }

  $table.='</table> </div>';
  echo $table;
  }
 ?>

 <script>
    $(document).ready(function(){
        var table =  $('#enrolltbl').DataTable();
    });

 </script>
