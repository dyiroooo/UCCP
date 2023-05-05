<?php
include 'dbcon.php';

if(isset($_POST['editprof_id'])) {

  $id =  $_POST['editprof_id'];

  $query = "SELECT * FROM uccp_professor WHERE id = '$id'";
  $query_run = mysqli_query($con, $query);

  while($row=mysqli_fetch_array($query_run)){
    $ids = $row['id'];
    $username = $row['username'];
    $password = $row['password'];
  }

  ?>
  <div class="form-group">
    <input type="hidden" name="profid" id="profid" class="form-control" value="<?= $ids ?>">
  </div>

    <div class="form-group">
    <label for="recipient-name" class="col-form-label">Username</label>
    <input type="text" name="profuser" id="profuser" class="form-control" value="<?= $username ?>">
  </div>
  
    <div class="form-group">
    <label for="recipient-name" class="col-form-label">Password</label>
    <input type="text" name="profpass" id="profpass" class="form-control" value="<?= $password ?>">
  </div>
  <?php
}
?>
