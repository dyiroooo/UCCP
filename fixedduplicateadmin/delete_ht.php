<?php
include 'dbcon.php';

if(isset($_POST['delht_id'])) {

  $id =  $_POST['delht_id'];

  $query = "SELECT * FROM uccp_ht_tbl WHERE id = '$id'";
  $query_run = mysqli_query($con, $query);

  while($row=mysqli_fetch_array($query_run)){
    $id = $row['id'];
  }

 ?>

 <input type="hidden" name="htremove" id="htremove" value="<?= $id ?>">
 <p>Are you sure you want to delete this Record?</p>
<?php
}
 ?>
