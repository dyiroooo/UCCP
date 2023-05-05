<?php
include 'dbcon.php';
$adminid = $_POST['adminid'];

  $query = "SELECT * FROM uccp_adminacc_tbl WHERE id = '$adminid'";
  $query_run = mysqli_query($con,$query);

  while($adminacc = mysqli_fetch_array($query_run)){
  ?>
  <label hidden class="fw-bold">ID</label>
  <p hidden><?php echo $adminacc['id'];?> </p>
  <label class="fw-bold">Username</label>
  <p><?php echo $adminacc['username'];?> </p>
  <label class="fw-bold">Email</label>
  <p><?php echo $adminacc['email'];?> </p>
  <label class="fw-bold">Phone No.</label>
  <p><?php echo $adminacc['phone'];?> </p>
  <?php
}

 ?>
