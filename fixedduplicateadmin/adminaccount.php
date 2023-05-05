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
      <center><h1>Admin Accounts</h1></center
        <!-- Start of Modal for Adding Account -->
        <div class="modal fade" id="addadminaccount" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Add Admin Account</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
              </div>
              <form id="saveAdmin">
                <div class="modal-body">
                  <div class="form-group">
                    <label for="recipient-name"  class="col-form-label">Username</label>
                    <input type="text" class="form-control" id="admin_username" name="admin_username" required>
                    <label id="lblusername" style="color:red"></label>
                  </div>
                  <div class="form-group">
                    <label for="recipient-name" class="col-form-label">Password</label>
                    <input type="password" class="form-control" id="admin_password" name="admin_password" required>
                    <input type="checkbox" onclick="chkbxShowpassword()" id="showpassword" name="showpassword" aria-label="Checkbox for following text input"> Show Password <label id="lblpassword" style="color:red"></label>
                  </div>
                  <div class="form-group">
                    <label for="recipient-name" class="col-form-label">Email</label>
                    <input type="text" class="form-control" id="admin_email" name="admin_email" required>
                    <label id="lblemail" style="color:red"></label>
                  </div>
                  <div class="form-group">
                    <label for="recipient-name" class="col-form-label">Phone No.</label>
                    <input type="number" class="form-control" id="admin_phone" name="admin_phone" required >
                    <label id="lblphone" style="color:red"></label>
                  </div>
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                  <button type="button" class="btn btn-primary" id="btnsaveadmin" name="btnsaveadmin">Save Account</button>
                </div>
              </form>
            </div>
          </div>
        </div>
        <!-- End of Modal for Adding Account -->

        <!-- Button for Adding Account Start -->
        <button type="button" class="btn btn-primary float-start m-3" data-bs-toggle="modal" data-bs-target="#addadminaccount">Add Account</button>
        <!-- Button for Adding Account End -->

        <!-- Modal for Viewing Admin Account Start -->
        <div class="modal fade" id="viewadminacc"  tabindex="-1" role="dialog" aria-labelledby="viewadminacc" aria-hidden="true">
          <div class="modal-dialog" role="document">
            <?php include('alertmessage.php'); ?>
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title">Viewing News</h5>
                <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="adminview-modal-body m-3">
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-primary" data-bs-dismiss="modal">Done</button>
              </div>
            </div>
          </div>
        </div>
        <!-- Modal for Viewing Admin Account End -->

        <!-- Edit Admin Account Modal Start-->
        <div class="modal fade" id="editadminData" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <form class="" action="#" method="post" id="updateAdminForm">
                <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalLabel">Edit Admin Information</h5>
                  <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <div class="modal-body" id="infoadmin_update">

                </form>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="button" id="adminupdate" name="updatebtn" class="btn btn-primary pull-right">Update</Button>
                </div>
              </div>
            </div>
          </div>
          <!-- Edit Modal End -->

          <!-- Delete Admin Account Modal Start -->
          <div class="modal fade" id="deladminData" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
              <div class="modal-content">
                <form class="" action="#" method="post" id="deleteadminForm">
                  <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Delete Admin Information</h5>
                    <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                  <div class="modal-body" id="infoadmin_delete">

                  </form>
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                  <button type="button" id="admindelete" name="updatebtn" class="btn btn-danger pull-right">Delete</Button>
                  </div>
                </div>
              </div>
            </div>
            <!-- Delete Admin Account Modal End -->

            <!-- Table List of Admin Accounts Start -->
            <form class="" action="" method="post">
              <table id="adminaccountlists" class="table table-striped table-bordered">
                <thead>
                  <tr>
                    <th style="display:none" scope="col">#</th>
                    <th scope="col">Username</th>
                    <th scope="col">Email</th>
                    <th scope="col">Phone</th>
                    <th scope="col">Actions</th>
                  </tr>
                </thead>
                <tbody>
                  <?php
                  $query = "SELECT * FROM uccp_adminacc_tbl";
                  $query_run = mysqli_query($con, $query);

                  if (mysqli_num_rows($query_run)>0) {
                    while ($adminacc = mysqli_fetch_array($query_run)){
                      ?>
                      <tr>
                        <td style="display:none"><?= $adminacc['id']?></td>
                        <td><?= $adminacc['username']?></td>
                        <td><?= $adminacc['email']?></td>
                        <td><?= $adminacc['phone']?></td>
                        <td>
                          <div class="btn-group" role="group" aria-label="Basic example">
                            <button data-id="<?= $adminacc['id'] ?>" type="button" name="adminaccview" class="btn btn-info viewadmin" data-bs-toggle="modal" data-bs-target="#viewadminacc"><i class="fa-solid fa-eye"></i></button>
                            <button type="button" id="<?= $adminacc['id']?>" class="btn btn-success admineditdata" id=""><i class="fa-solid fa-pen-to-square"></i></button>
                            <button type="button" id="<?= $adminacc['id']?>" name="adminaccremove" class="btn btn-danger adminremovedata"><i class="fa-solid fa-trash"></i></button>
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
            </form>
            <!-- Table List of Admin Accounts End -->
          </div>
        </div>
      </div>
      <?php include 'includes/footer.php' ?>
      <script>
          $(document).ready(function () {
                $('#adminaccountlists').DataTable();
            });
      </script>
