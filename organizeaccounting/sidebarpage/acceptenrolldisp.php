<?php
include '../include/config.php';

if(isset($_POST['acceptenroll_id'])) {

  $id =  $_POST['acceptenroll_id'];

  $query = "SELECT * FROM `uccp_enrollment_billing` WHERE id = '$id'";
  $query_run = mysqli_query($conn, $query);

 ?>

 <input type="hidden" name="acceptenroll" id="acceptenroll" value="<?= $id ?>">
 <p>Are you sure you want to Accept this Enrollee?</p>
<?php
}
 ?>
