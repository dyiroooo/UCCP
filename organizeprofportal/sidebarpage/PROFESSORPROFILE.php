<?php
session_start();
include 'include/config.php';

$sql = "SELECT * FROM `uccp_professor`";
$result = mysqli_query($conn,$sql);
$fullname = $_SESSION['fullname'];
$address = $_SESSION['address'];
$emailadd = $_SESSION['email'];
$gender = $_SESSION['gender'];
$contact = $_SESSION['contact'];
$faculty = $_SESSION['faculty'];
?>

<div class="container">
    <center>
    <div class="main-body">
        <div class="row">
            <div class="col-md-8">
              <div class="card mb-3">
                <div class="card-body">
                <hr>
                  <div class="row">
                    <div class="col-sm-3">
                      <h6 class="mb-0">Full Name:</h6>
                    </div>
                    <div class="col-sm-9 text-secondary">
                      <?= $fullname ?>
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
                      <?= $emailadd ?>
                    </div>
                  </div>
                  <hr>
                  <div class="row">
                    <div class="col-sm-3">
                      <h6 class="mb-0">Phone Number:</h6>
                    </div>
                    <div class="col-sm-9 text-secondary">
                      <?= $contact ?>
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
                      <h6 class="mb-0">Faculty:</h6>
                    </div>
                    <div class="col-sm-9 text-secondary">
                      <?= $faculty ?>
                    </div>
                  </div>
                  <hr>
                </div>
              </div>
            </div>
          </div>
        </div>
        </center>
    </div>



