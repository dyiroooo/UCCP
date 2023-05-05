<?php
include '../include/config.php';
 $ids = $_POST['adid'];
 ?>


<div class='print bg-white' id="print">
  <div class="card mb-3">
    <div class="invoice-title" align="center">
      <div class="card-header">
        <img src="sidebarpage/UCCLOGO.png" alt="" width="75" height="75">
          <h3>OFFICIAL RECEIPT</h3>
          <h6>City of Caloocan</h6>
      </div>
    </div>
  </div>
    <?php
      $query = "SELECT * FROM `uccp_admission_billing` WHERE id= '$ids';";
      $query_run = mysqli_query($conn, $query);
      while ($row = mysqli_fetch_array($query_run)) {
      ?>
        <div class="card mb-3">
          <div class="card-header" align="center">
            <h4>Admission Receipt</h4>
          </div>
              <div class="card-body">
                <p class="float-start"><b>OR Number: </b><?= $row['ornumber']?></p>
                <p class="float-end"><b>DATE: </b><?= date("M/d/Y"); ?> </p>
                </br>
                </br>
                  <b>PAYOR:</b></br>
                  <?= $row['Name'];?>
                </br>
              </div>
          </div>
              <div class="card">
                <div class="card-body">
                  <table class="table table-bordered">
                    <thead>
                      <tr>
                        <th>Fee Type</th>
                        <th>Amount</th>
                      </tr>
                    </thead>
                      <tbody>
                        <tr>
                          <td><?= $row['type']; ?></td>
                          <td><?= $row['price']?></td>
                        </tr>
                    </tbody>
                  </table>
                <?php
                }
                ?>
                </div>
              </div>
        </div>
