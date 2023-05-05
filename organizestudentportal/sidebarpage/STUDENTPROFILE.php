<?php
// session_start();
include 'include/config.php';

$sql = "SELECT * FROM `uccp_studentinfo`";
$result = mysqli_query($conn,$sql);
$name = $_SESSION['name'];
$gender = $_SESSION['gender'];
$birthday = $_SESSION['birthday'];
$email = $_SESSION['email'];
$phone = $_SESSION['phone'];
$address = $_SESSION['address'];
$year = $_SESSION['year'];
$course = $_SESSION['course'];
$section = $_SESSION['section'];
$picture = $_SESSION['picture'];
$status = $_SESSION['status'];
$sem= $_SESSION['sem'];
?>

<center>
<div class="container">
    <div class="main-body">
        <div class="row">
            <div class="col-md-4">
              <div class="card">
                <div class="card-body">
                  <div class="d-flex flex-column align-items-center text-center">
                    <img src="../images/<?= $picture ?>" class="img-fluid img-thumbnail" width="100%">
                    <div class="mt-3">
                      <h4><?= $name ?></h4>
                      <p class="text-muted font-size-sm"> <?= $section ?></p>
                     <p class="text-muted font-size-sm"> <?= $sem?> SEMESTER</p>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-md-8">
              <div class="card mb-3">
                <div class="card-body">
                <div class="row">
                    <div class="col-sm-3">
                      <h6 class="mb-0">Status:</h6>
                    </div>
                    <div class="col-sm-9 text-secondary">
                      <?= $status ?>
                    </div>
                  </div>   
                <hr>
                  <div class="row">
                    <div class="col-sm-3">
                      <h6 class="mb-0">Full Name:</h6>
                    </div>
                    <div class="col-sm-9 text-secondary">
                      <?= $name ?>
                    </div>
                  </div>
                  <hr>
                    <div class="row">
                    <div class="col-sm-3">
                      <h6 class="mb-0">Gender:</h6>
                    </div>
                    <div class="col-sm-9 text-secondary">
                      <?= $gender ?>
                    </div>
                  </div>
                  <hr>
                  <div class="row">
                    <div class="col-sm-3">
                      <h6 class="mb-0">Email:</h6>
                    </div>
                    <div class="col-sm-9 text-secondary">
                      <?= $email ?>
                    </div>
                  </div>
                  <hr>
                  <div class="row">
                    <div class="col-sm-3">
                      <h6 class="mb-0">Phone Number:</h6>
                    </div>
                    <div class="col-sm-9 text-secondary">
                      <?= $phone ?>
                    </div>
                  </div>
                  <hr>
                  <div class="row">
                    <div class="col-sm-3">
                      <h6 class="mb-0">Address:</h6>
                    </div>
                    <div class="col-sm-9 text-secondary">
                      <?= $address ?>
                    </div>
                  </div>
                  <hr>
                    <div class="row">
                        <div class="col-sm-3">
                          <h6 class="mb-0">Birthday:</h6>
                        </div>
                        <div class="col-sm-9 text-secondary">
                          <?= $birthday ?>
                        </div>
                  </div>
                  <hr>
                </div>
              </div>
            </div>
          </div>
        </div>
    </div>
</center>


