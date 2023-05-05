<?php
include 'dbcon.php';
$studentinfoid = $_POST['studentinfoid'];

  $query = "SELECT * FROM uccp_studentinfo WHERE id = '$studentinfoid'";
  $query_run = mysqli_query($con,$query);

  while($row = mysqli_fetch_array($query_run)){
  ?>
  <label hidden class="fw-bold">ID</label>
  <p hidden><?php echo $row['id'];?> </p>
  <label class="fw-bold">Name</label>
  <p><?php echo $row['name'];?> </p>
  <label class="fw-bold">Course</label>
  <p><?php echo $row['course'];?> </p>
  <label class="fw-bold">Year Level</label>
  <p><?php echo $row['year'];?> </p>
  <label class="fw-bold">Gender</label> <p><?php echo $row['gender'];?> </p>
  <label class="fw-bold">Birth Date</label> <p><?php echo $date = $row['birthday']; ?> </p>
  <label class="fw-bold">Email</label>
  <p><?php echo $row['email'];?> </p>
  <label class="fw-bold">Phone No.</label>
  <p><?php echo $row['phone'];?> </p>
  <label class="fw-bold">Username</label>
  <p><?php echo $row['username'];?></p>
  <label class="fw-bold">Password</label>
  <p><?php echo password_hash($row['password'], PASSWORD_BCRYPT);?></p>
  <?php
}

 ?>
