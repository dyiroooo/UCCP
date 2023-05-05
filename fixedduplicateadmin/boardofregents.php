<?php
include 'includes/header.php';
include 'dbcon.php';
?>
<div class="d-flex" id="wrapper">
  <?php include 'includes/sidebar.php' ?>
  <!-- Page Content -->
  <div id="page-content-wrapper">
    <nav class="navbar navbar-expand-lg navbar-light bg-transparent py-4 px-4">
      <div class="d-flex align-items-center">
        <i class="fas fa-bars primary-text fs-4 me-3" id="menu-toggle"></i>
        <h2 class="fs-2 m-0">Admin Dashboard</h2>
      </div>
    </nav>
    <div class="container"><br>
          <div class="row">
          <div class="col-md-12">
              <div class="card ">
                <div class="card-header">
                  <center><h1>Board of Regents</h1></center>
                </div>
                  <div class="card-body">
    <!-- button for adding board of regents start-->
    <button type="button" class="btn btn-primary float-start m-2" data-bs-toggle="modal" data-bs-target="#addboardofregents">Add Higher Member of the Board</button>
    <!-- button for adding board of regents end-->

    <!-- Modal for Adding Board of Regents Start -->
    <div class="modal fade" id="addboardofregents" tabindex="-1" role="dialog" aria-labelledby="boardreg" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title">Add New Higher Member of the Board</h5>
            <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="create-modal-body m-3">
            <form id="BORform" action="add_bor.php" method="POST" enctype="multipart/form-data">
              <div class="form-group">
                <label for="recipient-name" class="col-form-label">Board Member Name</label>
                <input type="text" class="form-control" name="BORname">
              </div>
              <div class="form-group">
                <label for="recipient-name" class="col-form-label">Board Position</label>
                <input type="text" class="form-control" name="BORposition">
              </div>
              <div class="form-group">
                <label for="message-text" class="col-form-label">Board Member Description</label>
                <textarea class="form-control" name="BORdescription"></textarea>
              </div>
              <div class="form-group m-4">
                <label for="message-text" class="col-form-label">Board Member Image</label>
                <input type="file" accept=".jpg, .png, .gif" name="BORimgreceiver" class="btn btn-light m-3"></input>
              </div>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
              <button type="submit" class="btn btn-primary" name="addbtnBOR">Add Member</button>
            </div>
          </form>
        </div>
      </div>
    </div>
    <!-- Modal for Adding Board of Regents End -->

    <!-- Table Board of Regents List Start -->
    <table id="higherbortbl" class="table table-bordered table-striped">
      <thead>
        <tr>
          <th hidden scope="col">#</th>
          <th scope="col">Position</th>
          <th scope="col">Name</th>
          <th scope="col">Image</th>
          <th scope="col">Actions</th>
        </tr>
      </thead>
      <tbody>
        <!-- Add Board of Regents Query PHP -->
        <?php
        $query = "SELECT * FROM uccp_bor_tbl WHERE bor_level = 1";
        $query_run = mysqli_query($con, $query);
        if (mysqli_num_rows($query_run)>0) {
          while($row = mysqli_fetch_array($query_run)) {
            ?>
            <tr>
              <td hidden><?= $row['id']; ?></td>
              <td><strong><?= strtoupper($row['bor_position']); ?></strong> <br> <small><?= $row['bor_description']; ?></small> </td>
              <td><?= $row['bor_name']; ?></td>
              <td><img src="<?= '../fixedduplicateadmin/imgbor/' . $row['bor_image']?>" height="150" width="150" alt=""></td>
              <td>
                <div class="btn-group" role="group" aria-label="Basic example">
                  <!-- View Board Member Details -->
                  <button data-id="<?= $row['id']; ?>" type="button" class="btn btn-info btnborview" data-bs-toggle="modal" data-bs-target="#viewbor" name="viewborbtn"><i class="fa-solid fa-eye"></i></button>
                  <!-- Edit or Update Board Members -->
                  <button href="#" data-role="update" id="<?= $row['id']; ?>" type="button" class="edit_data btn btn-success" data-bs-toggle="modal" data-bs-target="<?php echo "#editbordata" . $row['id']; ?>" name="btnedit"><i class="fa-solid fa-pen-to-square"></i></button>
                  <!-- Modal -->
                  <div class="modal fade" id="<?php echo "editbordata" . $row['id']; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h5 class="modal-title" id="exampleModalLongTitle">Edit Board of Regents</h5>
                          <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                          </button>
                        </div>
                        <div class="modal-body">
                          <form action="editbor_data.php" method="post" enctype="multipart/form-data">
                            <input type="text" name="editborid" value="<?= $row['id'] ?>" hidden>
                            <div class="form-group">
                              <label for="recipient-name" class="col-form-label">Edit Board of Regents Name</label>
                              <input type="text" class="form-control" name="editborname" value="<?= $row['bor_name'] ?>">
                            </div>
                            <div class="form-group">
                              <label for="recipient-name" class="col-form-label">Edit Board of Regents Position</label>
                              <input type="text" class="form-control" name="editborposition" value="<?= $row['bor_position'] ?>">
                            </div>
                            <div class="form-group">
                              <label for="message-text" class="col-form-label">Edit Board of Regents Description</label>
                              <textarea class="form-control" name="editbordescription"><?= $row['bor_description'] ?></textarea>
                            </div>
                            <div class="form-group m-4">
                              <label for="message-text" class="col-form-label">Edit Board of Regents Image</label>
                              <input type="file" accept=".jpg, .png, .gif" name="editborimage" class="btn btn-light m-3"></input>
                              <img src="<?= 'imgbor/' . $row['bor_image'] ?>" class="img-thumbnail" alt="">
                            </div>
                          </div>
                          <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button type="submit" name="btnboredit" class="btn btn-primary">Save changes</button>
                          </div>
                        </form>
                      </div>
                    </div>
                  </div>
                  <!-- Removing Button -->
                  <button type="button" class="btn btn-danger borremovedata " id="<?= $row['id'] ?>" name="btnremovebor"><i class="fa-solid fa-trash"></i></button>
                </div>
              </td>
            </tr>
            <?php
          }
        } else {
          
        }
        ?>
      </tbody>
    </table>

    <!-- Normal Members of the Board -->

    <div class="container"> <br>
      <center><h1>Member of Board of Regents</h1></center>

      <!-- button for adding board of regents start-->
      <button type="button" class="btn btn-primary float-start m-2" data-bs-toggle="modal" data-bs-target="#addmemberbor">Add Member of the Board</button>
      <!-- button for adding board of regents end-->

      <!-- Modal for Adding Board of Regents Start -->
      <div class="modal fade" id="addmemberbor" tabindex="-1" role="dialog" aria-labelledby="boardreg" aria-hidden="true">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title">Add New Member of the Board</h5>
              <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="create-modal-body m-3">
              <form id="MBORform" action="add_mbor.php" method="POST" enctype="multipart/form-data">
                <div class="form-group">
                  <label for="recipient-name" class="col-form-label">Board Member Name</label>
                  <input type="text" class="form-control" name="MBORname">
                </div>
                <div class="form-group">
                  <label for="recipient-name" class="col-form-label">Board Position</label>
                  <input type="text" class="form-control" name="MBORposition" readonly value="Member, B.O.R">
                </div>
                <div class="form-group">
                  <label for="message-text" class="col-form-label">Board Member Description</label>
                  <textarea class="form-control" name="MBORdescription"></textarea>
                </div>
                <div class="form-group m-4">
                  <label for="message-text" class="col-form-label">Board Member Image</label>
                  <input type="file" accept=".jpg, .png, .gif" name="MBORimgreceiver" class="btn btn-light m-3"></input>
                </div>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary" name="addbtnMBOR">Add Member</button>
              </div>
            </form>
          </div>
        </div>
      </div>
      <!-- Modal for Adding Board of Regents End -->
      <table id="lowerbortbl" class="table table-bordered table-striped">
        <thead>
          <tr>
            <th hidden scope="col">#</th>
            <th scope="col">Position</th>
            <th scope="col">Name</th>
            <th scope="col">Image</th>
            <th scope="col">Actions</th>
          </tr>
        </thead>
        <tbody>
          <!-- Add Normal Member of the Board of Regents Query PHP -->
          <?php
          $query = "SELECT * FROM uccp_bor_tbl WHERE bor_level = 2";
          $query_run = mysqli_query($con, $query);
          if (mysqli_num_rows($query_run)>0) {
            while($row2 = mysqli_fetch_array($query_run)) {
              ?>
              <tr>
                <td hidden><?= $row['id']; ?></td>
                <td><strong><?= strtoupper($row2['bor_position']); ?></strong> <br> <small><?= $row2['bor_description']; ?></small> </td>
                <td><?= $row2['bor_name']; ?></td>
                <td><img src="<?= '../fixedduplicateadmin/imgbor/' . $row2['bor_image']?>" height="150" width="150" alt=""></td>
                <td>
                  <div class="btn-group" role="group" aria-label="Basic example">
                    <!-- View Board Member Details -->
                    <button data-id="<?= $row2['id']; ?>" type="button" class="btn btn-info btnborview" data-bs-toggle="modal" data-bs-target="#viewbor" name="viewborbtn"><i class="fa-solid fa-eye"></i></button>
                    <!-- Edit or Update Board Members -->
                    <button href="#" data-role="update" id="<?= $row2['id']; ?>" type="button" class="edit_data btn btn-success" data-bs-toggle="modal" data-bs-target="<?php echo "#editmbordata" . $row2['id']; ?>" name="btnedit"><i class="fa-solid fa-pen-to-square"></i></button>
                    <!-- Modal -->
                    <div class="modal fade" id="<?php echo "editmbordata" . $row2['id']; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
                      <div class="modal-dialog" role="document">
                        <div class="modal-content">
                          <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLongTitle">Edit Board of Regents</h5>
                            <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                              <span aria-hidden="true">&times;</span>
                            </button>
                          </div>
                          <div class="modal-body">
                            <form action="editmbor_data.php" method="post" enctype="multipart/form-data">
                              <input type="text" name="editmborid" value="<?= $row2['id'] ?>" hidden>
                              <div class="form-group">
                                <label for="recipient-name" class="col-form-label">Edit Board of Regents Name</label>
                                <input type="text" class="form-control" name="editmborname" value="<?= $row2['bor_name'] ?>">
                              </div>
                              <div class="form-group">
                                <label for="recipient-name" class="col-form-label">Edit Board of Regents Position</label>
                                <input type="text" class="form-control" name="editmborposition" value="<?= $row2['bor_position'] ?>" readonly>
                              </div>
                              <div class="form-group">
                                <label for="message-text" class="col-form-label">Edit Board of Regents Description</label>
                                <textarea class="form-control" name="editmbordescription"><?= $row2['bor_description'] ?></textarea>
                              </div>
                              <div class="form-group m-4">
                                <label for="message-text" class="col-form-label">Edit Board of Regents Image</label>
                                <input type="file" accept=".jpg, .png, .gif" name="editmborimage" class="btn btn-light m-3"></input>
                                <img src="<?= 'imgbor/' . $row2['bor_image'] ?>" class="img-thumbnail" alt="">
                              </div>
                            </div>
                            <div class="modal-footer">
                              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                              <button type="submit" name="btnmboredit" class="btn btn-primary">Save changes</button>
                            </div>
                          </form>
                        </div>
                      </div>
                    </div>
                    <!-- Removing Button -->
                    <button type="button" class="btn btn-danger borremovedata " id="<?= $row2['id'] ?>" name="btnremovebor"><i class="fa-solid fa-trash"></i></button>
                  </div>
                </td>
              </tr>
              <?php
            }
          } else {
            
          }
          ?>
        </tbody>
      </table>
    </div>

    <!-- Table News List End -->

    <!-- Modal for Viewing Board Members Start -->
    <div class="modal fade" id="viewbor"  tabindex="-1" role="dialog" aria-labelledby="viewbor" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="addnewstitle">Viewing Board of Regents Member</h5>
            <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="viewbor-modal-body m-3">

          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-primary" data-bs-dismiss="modal">Done</button>
          </div>
        </div>
      </div>
    </div>
    <!-- Modal for Viewing Members End -->

    <!-- Delete Board of Regents Modal Start -->
    <div class="modal fade" id="delborData" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <form class="" action="#" method="post" id="deleteborForm">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">Delete Board Member Information</h5>
              <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body" id="infobor_delete">

            </form>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            <button type="button" id="bordelete" name="updatebtn" class="btn btn-danger pull-right">Delete</Button>
            </div>
          </div>
        </div>
      </div>
      <!-- Delete Admin Account Modal End -->
      <!-- Modal for Adding Board of Regents End -->
    </div>
  </div>
</div>
</div>
</div>
</div>
</div>
  <?php include 'includes/footer.php' ?>
  
  <script>
      $(document).ready(function () {
        $('#higherbortbl').DataTable();
    });
    
      $(document).ready(function () {
        $('#lowerbortbl').DataTable();
    });
  </script>
