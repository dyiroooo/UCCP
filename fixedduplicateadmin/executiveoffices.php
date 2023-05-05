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
                  <center><h1>Executive Offices</h1></center>
                </div>
                  <div class="card-body">
      <!-- button for adding executive office start-->
      <button type="button" class="btn btn-primary float-start m-2" data-bs-toggle="modal" data-bs-target="#addexecutiveoffice">Add Executive Office Member</button>
      <!-- button for adding executive office end-->

      <!-- Modal for Adding Executive Office Member Start -->
      <div class="modal fade" id="addexecutiveoffice" tabindex="-1" role="dialog" aria-labelledby="boardreg" aria-hidden="true">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title">Add New Member of the Executive Office</h5>
              <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="create-modal-body m-3">
              <form id="XOform" action="add_xo.php" method="POST" enctype="multipart/form-data">
                <div class="form-group">
                  <label for="recipient-name" class="col-form-label">Executive Office Member Name</label>
                  <input type="text" class="form-control" name="XOname">
                </div>
                <div class="form-group">
                  <label for="recipient-name" class="col-form-label">Executive Office Member Position</label>
                  <input type="text" class="form-control" name="XOposition">
                </div>
                <div class="form-group">
                  <label for="message-text" class="col-form-label">Executive Office Member Description</label>
                  <textarea class="form-control" name="XOdescription"></textarea>
                </div>
                <div class="form-group m-4">
                  <label for="message-text" class="col-form-label">Executive Office Member Image</label>
                  <input type="file" accept=".jpg, .png, .gif" name="XOimgreceiver" class="btn btn-light m-3"></input>
                </div>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary" name="addbtnXO">Add Members</button>
              </div>
            </form>
          </div>
        </div>
      </div>
      <!-- Modal for Adding Executive Office Member End -->

      <!-- Table executive office List Start -->
      <table id="exotbl" class="table table-bordered table-striped">
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
          $query = "SELECT * FROM uccp_xo_tbl";
          $query_run = mysqli_query($con, $query);
          if (mysqli_num_rows($query_run)>0) {
            while($row = mysqli_fetch_array($query_run)) {
              ?>
              <tr>
                <td hidden><?= $row['id']; ?></td>
                <td><strong><?= strtoupper($row['xo_position']); ?></strong> <br> <small><?= $row['xo_description']; ?></small> </td>
                <td><?= $row['xo_name']; ?></td>
                <td><img src="<?= '../fixedduplicateadmin/imgxo/' . $row['xo_image']?>" height="150" width="150" alt=""></td>
                <td>
                  <div class="btn-group" role="group" aria-label="Basic example">
                    <!-- View Board Member Details -->
                    <button data-id="<?= $row['id']; ?>" type="button" class="btn btn-info btnxoview" data-bs-toggle="modal" data-bs-target="#viewxo" name="viewxobtn"><i class="fa-solid fa-eye"></i></button>
                    <!-- Edit or Update Board Members -->
                    <button href="#" data-role="update" id="<?= $row['id']; ?>" type="button" class="edit_data btn btn-success" data-bs-toggle="modal" data-bs-target="<?php echo "#editxodata" . $row['id']; ?>"><i class="fa-solid fa-pen-to-square"></i></button>
                    <!-- Modal -->
                    <div class="modal fade" id="<?php echo "editxodata" . $row['id']; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
                      <div class="modal-dialog" role="document">
                        <div class="modal-content">
                          <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLongTitle">Edit Executive Office Member</h5>
                            <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                              <span aria-hidden="true">&times;</span>
                            </button>
                          </div>
                          <div class="modal-body">
                            <form action="editxo_data.php" method="post" enctype="multipart/form-data">
                              <input type="text" name="editxoid" value="<?= $row['id'] ?>" hidden>
                              <div class="form-group">
                                <label for="recipient-name" class="col-form-label">Edit Executive Office Member Name</label>
                                <input type="text" class="form-control" name="editxoname" value="<?= $row['xo_name'] ?>">
                              </div>
                              <div class="form-group">
                                <label for="recipient-name" class="col-form-label">Edit Executive Office Member Position</label>
                                <input type="text" class="form-control" name="editxoposition" value="<?= $row['xo_position'] ?>">
                              </div>
                              <div class="form-group">
                                <label for="message-text" class="col-form-label">Edit Executive Office Member Description</label>
                                <textarea class="form-control" name="editxodescription"><?= $row['xo_description'] ?></textarea>
                              </div>
                              <div class="form-group m-4">
                                <label for="message-text" class="col-form-label">Edit Executive Office Member Image</label>
                                <input type="file" accept=".jpg, .png, .gif" name="editxoimage" class="btn btn-light m-3"></input>
                                <img src="<?= 'imgxo/' . $row['xo_image'] ?>" class="img-thumbnail" alt="">
                              </div>
                            </div>
                            <div class="modal-footer">
                              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                              <button type="submit" name="btnxoedit" class="btn btn-primary">Save changes</button>
                            </div>
                          </form>
                        </div>
                      </div>
                    </div>
                    <!-- Removing Button -->
                    <button type="button" class="btn btn-danger xoremovedata" id="<?= $row['id'] ?>" name="btnremovexo"><i class="fa-solid fa-trash"></i></button>
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
      <!-- Table News List End -->

      <!-- Modal for Viewing executive office Start -->
      <div class="modal fade" id="viewxo"  tabindex="-1" role="dialog" aria-labelledby="viewxo" aria-hidden="true">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title">Viewing Executive Office Member</h5>
              <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="viewxo-modal-body m-3">

            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-primary" data-bs-dismiss="modal">Done</button>
            </div>
          </div>
        </div>
      </div>
      <!-- Modal for Viewing Members End -->

      <!-- Delete executive office Modal Start -->
      <div class="modal fade" id="delxoData" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <form class="" action="#" method="post" id="deletexoForm">
              <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Delete Executive Office Member Information</h5>
                <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body" id="infoxo_delete">

              </form>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
              <button type="button" id="xodelete" name="updatebtn" class="btn btn-danger pull-right">Delete</Button>
              </div>
            </div>
          </div>
        </div>
        <!-- Delete executive office Modal End -->
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
        $('#exotbl').DataTable();
        });
    </script>
