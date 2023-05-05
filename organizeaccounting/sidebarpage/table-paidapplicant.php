<?php

include '../include/config.php';

if(isset($_POST['display'])){

  $table ='<div class="table-responsive-lg">
            <table class="table text-center cell-border table-hover table-bordered" id = "paidapplicanttbl">
              <thead>
                <tr align = "center">
                  <th>NAME</th>
                  <th>OR NUMBER</th>
                  <th>STATUS</th>
                </tr>
              </thead>';

      $sql= "SELECT * FROM `uccp_accpaidaddmission`";
      $result = mysqli_query($conn,$sql);

      while($row = mysqli_fetch_array($result)){

      $id = $row['id'];
      $status = $row['status'];
      $name= $row['name'];
      $ornumber= $row['ornumber'];

        $table.=' <tr id="row<?php echo '.$id.' ?>">
                    <td>'.$name.'</td>
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
      var table = $('#paidapplicanttbl').DataTable();
});

 </script>
