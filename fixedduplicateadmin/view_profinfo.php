<?php
include 'dbcon.php';
$profinfoid = $_POST['profinfoid'];

  $query = "SELECT * FROM uccp_professor WHERE id = '$profinfoid'";
  $query_run = mysqli_query($con,$query);

  while($row = mysqli_fetch_array($query_run)){
  ?>
  <label hidden class="fw-bold">ID</label>
  <p hidden><?php echo $row['id'];?></p>
  <label class="fw-bold">Name</label>
  <p><?php echo $row['fullname'];?> <br>
  <?php echo "<strong> Department: </strong>" . $row['faculty']; ?></p>
  <label class="fw-bold">Address</label>
  <p><?php echo $row['address'];?></p>
  <label class="fw-bold">Gender</label> <p><?php echo $row['gender'];?> </p>
  <label class="fw-bold">Email</label>
  <p><?php echo $row['email'];?> </p>
  <label class="fw-bold">Phone No.</label>
  <p><?php echo $row['contact'];?> </p>

  <?php
}

 ?>
