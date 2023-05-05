<?php
include 'include/config.php';

$query2 = "SELECT * FROM `uccp_studentinfo`";
$query_run1 = mysqli_query($conn, $query2);

$sec = $_SESSION['section'];

$query2 = "SELECT * FROM `uccp_sched`";
$query_run2 = mysqli_query($conn, $query2);
  while($row = mysqli_fetch_assoc($query_run2)){
                       $sc= $row['subjectcode'];
                        
                    }


?>

<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
              <div class="card-header">
                <h1>Grades</h1>
              </div>
                <div class="card-body">
                  <div class="container table-responsive">
                  <table class="table table-bordered text-center">
                    <thead>
                      <tr>
                        <th>Subject Code</th>
                        <!--<th>Subject Name</th>-->
                        <!--<th>Professor Name</th>-->
                        <!--<th>Units</th>-->
                        <th>Final Grade</th>
                        <th>Remarks</th>
                      </tr>
                    </thead>
                    <tbody>
                         <?php
                             $query = "SELECT  uccp_sched.*,uccp_grading.average,uccp_grading.remarks FROM uccp_sched,uccp_grading  WHERE uccp_grading.courseyearsection = '$sec' AND uccp_sched.courseyearsection ='$sec' ";
                             
                            // $query= "SELECT a.*,b.* FROM uccp_sched a INNER join uccp_grading b on a.courseyearsection = b.courseyearsection WHERE a.courseyearsection = 'BSIT-3A' AND a.subjectcode = b.subjectcode";
                          $query = "SELECT * FROM `uccp_grading` WHERE courseyearsection = '$sec'";
                             $query_run = mysqli_query($conn, $query);
                             
                                  while($row = mysqli_fetch_assoc($query_run))
                                  {
                             ?>
                        <tr>
                          <td><?= $row['subjectcode'] ?></td>
                         
                          
                          
                          <td><?=$row['average'] ?></td>
                          <td><?= $row['remarks'] ?></td>
                        </tr>
                        <?php
                            }
                        
                        ?>
                    </tbody>
                  </table>
                    <button class="btn btn-primary float-end" type="button">Apply</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
