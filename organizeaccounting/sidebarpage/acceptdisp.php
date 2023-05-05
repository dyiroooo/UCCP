<?php
include '../include/config.php';

if(isset($_POST['accept_id'])) {

  $id =  $_POST['accept_id'];

  $query = "SELECT * FROM uccp_admission_billing WHERE id = '$id'";
  $query_run = mysqli_query($conn, $query);
 ?>

 <input type="hidden" name="acceptapp" id="acceptapp" value="<?= $id ?>">
 <p>Are you sure you want to Accept this Applicant?</p>
<?php
}
 ?>
