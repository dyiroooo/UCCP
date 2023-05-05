<?php
include 'dbcon.php';

if(isset($_POST['editadmin_id'])) {

  $id =  $_POST['editadmin_id'];

  $query = "SELECT * FROM uccp_adminacc_tbl WHERE id = '$id'";
  $query_run = mysqli_query($con, $query);

  while($adminacc=mysqli_fetch_array($query_run)){
    $id = $adminacc['id'];
    $username = $adminacc['username'];
    $email = $adminacc['email'];
    $phone = $adminacc['phone'];
  }

 ?>
<form enctype="multipart/form-data">
  <div class="form-group">
    <input type="hidden" name="editadmin_id" id="editadmin_id" class="form-control" value="<?= $id ?>">
  </div>
  <div class="form-group">
    <label for="recipient-name" class="col-form-label">Username</label>
    <input type="text" name="edit_adminusername" id="edit_adminusername" class="form-control" value="<?= $username ?>">
  </div>
  <div class="form-group">
    <label for="recipient-name" class="col-form-label">Email</label>
    <input type="text" name="edit_adminemail" id="edit_adminemail" class="form-control" value="<?= $email ?>">
  </div>
  <div class="form-group">
    <label for="recipient-name" class="col-form-label">Phone</label>
    <input type="number" name="edit_adminphone" id="edit_adminphone" class="form-control" value="<?= $phone ?>">
  </div>
</form>
<?php
}
 ?>
