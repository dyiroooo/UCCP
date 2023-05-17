<?php
include '../include/config.php';

if (isset($_POST['deletedetails_id'])) {

  $id =  $_POST['deletedetails_id'];

  $query = "SELECT * FROM uccp_coursefee WHERE id = '$id'";
  $query_run = mysqli_query($conn, $query);

  while ($fees = mysqli_fetch_array($query_run)) {
    $id = $fees['id'];
    $c_id = $fees['curriculumid'];
  }
?>

  <input type="hidden" name="deletedetails" id="deletedetails" value="<?= $id ?>">
  <input type="hidden" name="deletecid" id="deletecid" value="<?= $c_id ?>">
  <p>Are you sure you want to delete this Fee?</p>
<?php
}
?>