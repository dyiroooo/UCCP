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
                   <center><h1>Professor Information</h1></center>
                </div>
                  <div class="card-body">

      <table id="professorinfotbl" class="table table-bordered table-hover cell-border">
        <thead>
          <tr>
            <th hidden scope="col">#</th>
            <th scope="col">Professor Information</th>
            <th scope="col">Professor Account</th>
            <th scope="col">Actions</th>
          </tr>
        </thead>
        <tbody>

          <?php
          $query = "SELECT * FROM uccp_professor";
          $query_run = mysqli_query($con, $query);
          if (mysqli_num_rows($query_run)>0) {
            while($row = mysqli_fetch_array($query_run)) {
              ?>
              <tr>
                <td hidden><?= $row['id']; ?></td>
                <!-- Professor Info Column -->
                <td>
                  <strong><?= $row['fullname']?></strong> | <small><?= $row['faculty'] ?></small> <br>
                  <small>
                    <?= $row['gender']?> | <?= $row['address']; ?>
                    <br>
                    <?= $row['email'];?> | <?= $row['contact'] ?>
                  </small>
                </td>
                <!-- Professor Info Column End -->

                <!-- Professor Account Start -->
                <td>
                <label style="font-weight:bold;">Username: </label> <?= $row['username'] ?> <br>
                <label style="font-weight:bold;">Password: </label> <?= $row['password'] ?>
                </td>
                <!-- Professor Account End -->
                <td>
                  <div class="btn-group" role="group" aria-label="Basic example">
                    <button data-id="<?= $row['id'] ?>" type="button" name="profinfoview" class="btn btn-info viewprofinfo" data-bs-toggle="modal" data-bs-target="#viewprofinfo"><i class="fa-solid fa-eye"></i></button>
                    <button type="button" id="<?= $row['id']?>" class="btn btn-success profeditdata"><i class="fa-solid fa-pen-to-square"></i></button>
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
    </div>
    </div>
    </div>
    </div>

    <!-- Modal for Viewing Admin Account Start -->
    <div class="modal fade" id="viewprofinfo"  tabindex="-1" role="dialog" aria-labelledby="viewprofinfo" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <?php include('alertmessage.php'); ?>
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title">Viewing Professor Information</h5>
            <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="profinfoview-modal-body m-3">
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-primary" data-bs-dismiss="modal">Done</button>
          </div>
        </div>
      </div>
    </div>
    <!-- Modal for Viewing Student Account End -->

    <!-- Edit Student Account Modal Start-->
    <div class="modal fade" id="editprofData" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <form class="" action="#" method="post" id="updateProfForm">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">Edit Professor Information</h5>
              <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body" id="infoprofessor_update">

            </form>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            <button type="button" id="profupdate" name="updateprofbtn" class="btn btn-primary pull-right">Update</Button>
            </div>
          </div>
        </div>
      </div>
      <!-- Edit Modal End -->

  </div>
</div>

<?php include 'includes/footer.php' ?>

<script type="text/javascript">
$(document).ready(function () {
  $('#professorinfotbl').DataTable();
});
</script>
