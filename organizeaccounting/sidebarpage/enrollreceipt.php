<?php
include '../include/config.php';
$c = $_POST['ids'];

?>
      <div class='print bg-white' id="print1">
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
                              $query = "SELECT * FROM `uccp_enrollment_billing` WHERE id='$c'; ";
                              $query_run = mysqli_query($conn, $query);
                              while ($row = mysqli_fetch_array($query_run)) { 
                                  ?>
                              <div class="card mb-3">
                                <div class="card-header">
                                    <center><h4>Enrollment Receipt</h4></center>
                                </div>
                                <div class="card-body">
                                  <p class="float-start"><b>OR Number: </b><?= $row['ornumber']?></p>
                                  <p class="float-end"><b>DATE: </b><?= date("M/d/Y"); ?> </p>
                                  </br>
                                  </br>
                                    <b>PAYOR:</b></br>
                                    <?= $row['name'];?> <br>
                                    <b>COURSE & YEAR:</b><br>
                                    <?= $row['course'] ."- ". $row['year'];?>
                                  </br>
                                </div>
                              </div>

                              <div class="card">
                                <div class="card-body">
                                  <table class="table table-bordered">
                                      <thead>
                                          <tr>
                                            <th>Fee Type</th>
                                            <th class = "text-center">Amount</th>
                                          </tr>
                                      </thead>
                                      <tbody>
                                        <tr>
                                          <td><?= $row ['feetype']; ?></td>
                                          <td class = "text-center"><?= $row ['price']; ?></td>                                         
                                        </tr>
                                      </tbody>
                                  </table>
                                    <table class = "table table-borderless">
                                    <tfoot>
                                      <tr>
                                        <td class = "float-end" ><b>Total Amount:<b></td>
                                        <td class = "text-center"><b>₱ <?= $row ['totalprice']; ?></b></td>
                                        </tr>
                                    </tfoot>
                                    </table>
                                <?php
                              } 
                              ?>
                                </div>
                              </div>
                            </div>