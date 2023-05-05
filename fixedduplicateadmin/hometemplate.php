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
    <div class="container">
          <div class="row">
          <div class="col-md-12">
              <div class="card ">
                <div class="card-header">
                  <center><h1>Home Templates</h1></center>
                </div>
                  <div class="card-body">
      <!-- button for adding highlights start-->
      <button type="button" class="btn btn-primary float-start m-2" data-bs-toggle="modal" data-bs-target="#addhometemplate">Add Highlights</button>
      <!-- button for adding highlights end-->

      <!-- Modal for adding highlights Start -->
      <div class="modal fade" id="addhometemplate" tabindex="-1" role="dialog" aria-labelledby="boardreg" aria-hidden="true">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title">Add Home Template</h5>
              <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="create-modal-body m-3">
              <form id="HTform" action="add_home.php" method="POST" enctype="multipart/form-data">
                <div class="form-group">
                  <label for="recipient-name" class="col-form-label">Add Highlights Title</label>
                  <input type="text" class="form-control" name="HTtitle">
                </div>
                <div class="form-group m-4">
                  <label for="message-text" class="col-form-label">Add Highlights Image</label>
                  <input type="file" accept=".jpg, .png, .gif" name="HTimgreceiver" class="btn btn-light m-3"></input>
                </div>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary" name="addbtnHT">Add Highlight</button>
              </div>
            </form>
          </div>
        </div>
      </div>
      <!-- Modal for Adding highlights End -->

      <!-- Table of highlights Start -->
      <table id="highlightstbl" class="table table-bordered table-striped">
        <thead>
          <tr>
            <th hidden scope="col">#</th>
            <th scope="col">Title</th>
            <th scope="col">Image</th>
            <th scope="col">Actions</th>
          </tr>
        </thead>
        <tbody>
          <!-- Add Board of Regents Query PHP -->
          <?php
          $query = "SELECT * FROM uccp_ht_tbl";
          $query_run = mysqli_query($con, $query);

          if (mysqli_num_rows($query_run)>0) {
            while($row = mysqli_fetch_array($query_run)) {
              ?>
              <tr>
                <td hidden><?= $row['id']; ?></td>
                <td><?= $row['ht_title']; ?></td>
                <td><img class="image mx-auto" height="150" width="325" src="<?= '../fixedduplicateadmin/imght/' . $row['ht_image']?>" alt=""></td>
                <td>
                  <div class="btn-group" role="group" aria-label="Basic example">
                    <!-- View Board Member Details -->
                    <button data-id="<?= $row['id']; ?>" type="button" class="btn btn-info btnhtview" data-bs-toggle="modal" data-bs-target="#viewht" name="viewborbtn"><i class="fa-solid fa-eye"></i></button>
                    <!-- Edit or Update Board Members -->
                    <button href="#" data-role="update" id="<?= $row['id']; ?>" type="button" class="edit_data btn btn-success" data-bs-toggle="modal" data-bs-target="<?php echo "#edithtdata" . $row['id']; ?>" name="btnedit"><i class="fa-solid fa-pen-to-square"></i></button>
                    <!-- Modal -->
                    <div class="modal fade" id="<?php echo "edithtdata" . $row['id']; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
                      <div class="modal-dialog" role="document">
                        <div class="modal-content">
                          <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLongTitle">Edit Highlights</h5>
                            <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                              <span aria-hidden="true">&times;</span>
                            </button>
                          </div>
                          <div class="modal-body">
                            <form action="editht_data.php" method="post" enctype="multipart/form-data">
                              <input type="text" name="edithtid" value="<?= $row['id'] ?>" hidden>
                              <div class="form-group">
                                <label for="recipient-name" class="col-form-label">Edit Highlight's Title</label>
                                <input type="text" class="form-control" name="edithttitle" value="<?= $row['ht_title'] ?>">
                              </div>
                              <div class="form-group m-4">
                                <label for="message-text" class="col-form-label">Edit Highlight's Image</label>
                                <input type="file" accept=".jpg, .png, .gif" name="edithtimage" class="btn btn-light m-3"></input>
                                <img src="<?= 'imght/' . $row['ht_image'] ?>" class="img-thumbnail" alt="">
                              </div>
                            </div>
                            <div class="modal-footer">
                              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                              <button type="submit" name="btnhtedit" class="btn btn-primary">Save changes</button>
                            </div>
                          </form>
                        </div>
                      </div>
                    </div>
                    <!-- Removing Button -->
                    <button type="button" class="btn btn-danger htremovedata" id="<?= $row['id'] ?>" name="btnremovebor"><i class="fa-solid fa-trash"></i></button>
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
      <!-- Table of highlights End -->

      <!-- Modal for Viewing highlights Start -->
      <div class="modal fade" id="viewht"  tabindex="-1" role="dialog" aria-labelledby="viewht" aria-hidden="true">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title">Viewing Highlights</h5>
              <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="viewht-modal-body m-3">

            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-primary" data-bs-dismiss="modal">Done</button>
            </div>
          </div>
        </div>
      </div>
      <!-- Modal for Viewing highlights End -->

      <!-- Delete highlights Start -->
      <div class="modal fade" id="delhtData" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <form class="" action="#" method="post" id="deletehtForm">
              <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Delete Executive Office Member Information</h5>
                <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body" id="infoht_delete">

              </form>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
              <button type="button" id="htdelete" name="updatebtn" class="btn btn-danger pull-right">Delete</Button>
              </div>
            </div>
          </div>
        </div>
        <!-- Delete highlights Modal End -->
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
        $('#highlightstbl').DataTable();
        });
    </script>
