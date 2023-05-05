<?php

 include '../include/config.php';

if(isset($_POST['display'])){

  $table ='<div class="table-responsive-lg">
          <table class="table text-center cell-border table-hover table-bordered " id = "enrollpaidtbl">
            <thead>
              <tr align = "center">
                <th>NAME</th>
                <th>COURSE</th>
                <th>YEAR</th>
                <th>OR Number</th>
                <th>STATUS</th>
              </tr>
            </thead>';

      $sql= "SELECT * FROM `uccp_accpaidenrollment`";
      $result = mysqli_query($conn,$sql);

      while($row = mysqli_fetch_array($result)){

      $id = $row['id'];
      $name = $row['name'];
      $course= $row['course'];
      $year= $row['year'];
      $status= $row['status'];
      $ornumber= $row['ornumber'];

        $table.='<tr id="row<?php echo '.$id.' ?>">
                  <td>'.$name.'</td>
                  <td>'.$course.'</td>
                  <td>'.$year.'</td>
                  <td>'.$ornumber.'</td>
                  <td>'.$status.'</td>
              </tr>';
    }

  $table.='</table> </div>';
  echo $table;
  }
 ?>
 
  <script>
 $(document).ready(function(){
      var table = $('#enrollpaidtbl').DataTable();
});

 </script>
