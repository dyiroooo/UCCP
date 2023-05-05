<?php
include 'dbcon.php';

if(isset($_POST['editstudent_id'])) {

  $id =  $_POST['editstudent_id'];

  $query = "SELECT * FROM uccp_studentinfo WHERE id = '$id'";
  $query_run = mysqli_query($con, $query);

  while($row=mysqli_fetch_array($query_run)){
    $idd = $row['id'];
    $name = $row['name'];
    $gender = $row['gender'];
    $bday = $row['birthday'];
    $address = $row['address'];
    $username = $row['username'];
    $email = $row['email'];
    $phone = $row['phone'];
    $username = $row['username'];
    $pass = $row['password'];
  }

  ?>
  <div class="form-group">
    <input type="hidden" name="stdid" id="stdid" class="form-control" value="<?= $idd ?>">
  </div>
  <div class="form-group">
    <label for="recipient-name" class="col-form-label">Name</label>
    <input type="text" name="stdname" id="stdname" class="form-control" value="<?= $name ?>">
  </div>
  <div class="form-group">
    <label for="Courses" class="form-label">Gender</label>
    <select class="form-control" name="stdgender" id="stdgender">
      <option hidden value="<?=$gender?>"><?= $gender; ?></option>
      <option value="Male">Male</option>
      <option value="Female">Female</option>
    </select>
  </div>
  <div class="form-group">
    <label for="recipient-name" class="col-form-label">Birth Date</label>
    <input type="date" name="stdbirthday" id="stdbirthday" class="form-control" value="<?= $bday ?>">
  </div>
  <div class="form-group">
    <label for="recipient-name" class="col-form-label">Email</label>
    <input type="text" name="stdemail" id="stdemail" class="form-control" value="<?= $email ?>">
  </div>
  <div class="form-group">
    <label for="recipient-name" class="col-form-label">Phone</label>
    <input type="number" name="stdphone" id="stdphone" class="form-control" value="<?= $phone ?>">
  </div>
  <div class="form-group">
    <label for="recipient-name" class="col-form-label">Home Address</label>
    <input type="text" name="stdaddress" id="stdaddress" class="form-control" value="<?= $address ?>">
  </div>  
  <div class="form-group">
    <label for="recipient-name" class="col-form-label">Username</label>
    <input type="text" name="stdusername" id="stdusername" class="form-control" value="<?= $username ?>">
  </div>
  <div class="form-group">
    <label for="recipient-name" class="col-form-label">Password</label>
    <input type="text" name="stdpassword" id="stdpassword" class="form-control" value="<?=  $pass //password_hash($pass, PASSWORD_BCRYPT) ?>">
  </div>
  <?php
}
?>
