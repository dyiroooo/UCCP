<?php
include 'dbcon.php';

if(isset($_POST['deladmin_id'])) {

  $id =  $_POST['deladmin_id'];

  $query = "SELECT * FROM uccp_adminacc_tbl WHERE id = '$id'";
  $query_run = mysqli_query($con, $query);

  while($adminacc=mysqli_fetch_array($query_run)){
    $id = $adminacc['id'];
  }

 ?>

 <input type="hidden" name="adminremove" id="adminremove" value="<?= $id ?>">
 <p>Are you sure you want to delete this Record?</p>
<?php
}
 ?>
