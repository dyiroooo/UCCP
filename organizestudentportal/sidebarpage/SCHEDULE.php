<?php 
include 'include/config.php';

$query2 = "SELECT * FROM `uccp_studentinfo`";
$query_run1 = mysqli_query($conn, $query2);

$sec = $_SESSION['section'];
?>

<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
              <div class="card-header">
                <h1>Schedule</h1>
              </div>
                <div class="card-body">
                  <div class="container table-responsive">
                    <table class="table table-bordered text-center">
                      <thead>
                        <tr>
                          <th>SUBCODE</th>
                          <th>DESCRIPTION</th>
                          <th>UNITS</th>
                          <th>DAY</th>
                          <th>TIME</th>
                          <th>ROOM</th>
                          <th>PROFESSOR</th>
                        </tr>
                      </thead>
                      <tbody>
                         <?php
                             $query = "SELECT * FROM `uccp_sched` WHERE courseyearsection = '$sec'";
                             $query_run = mysqli_query($conn, $query);
                              if(mysqli_num_rows($query_run) > 0)
                                {
                                  while($row = mysqli_fetch_array($query_run))
                                  {
                             ?>
                        <tr>
                          <td><?= $row['subjectcode'] ?></td>
                          <td><?= $row['subjectname'] ?></td>
                          <td><?= $row['units'] ?></td>
                          <td><?= $row['day'] ?></td>
                          <td><?= $row['starttime'] ?> - <?= $row['endtime'] ?></td>
                          <td><?= $row['room'] ?></td>
                          <td>Prof. <?= $row['professor'] ?></td>
                        </tr>
                        <?php
                            }
                        }
                        ?>
                      </tbody>
                    </table>
                  </div>
                </div>
            </div>
        </div>
    </div>
</div>
