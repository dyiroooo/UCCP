<?php
include 'dbcon.php';

if(isset($_POST['delbor_id'])) {

  $id =  $_POST['delbor_id'];

  $query = "SELECT * FROM uccp_bor_tbl WHERE id = '$id'";
  $query_run = mysqli_query($con, $query);

  while($row=mysqli_fetch_array($query_run)){
    $id = $row['id'];
  }

 ?>

 <input type="hidden" name="borremove" id="borremove" value="<?= $id ?>">
 <p>Are you sure you want to delete this Record?</p>
<?php
}
 ?>
