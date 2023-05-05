<?php
include 'dbcon.php';
$borid = $_POST['borid'];

 $query = "SELECT * FROM uccp_bor_tbl WHERE id = '$borid'";
 $query_run = mysqli_query($con,$query);

 while($row = mysqli_fetch_array($query_run)){
 ?>
 <label class="fw-bold">Board Member Name</label>
 <p><?php echo $row['bor_name'];?> </p>
 <label class="fw-bold">Board Member Position</label>
 <p><?php echo $row['bor_position'];?> </p>
 <label class="fw-bold">Board Member Description</label>
 <p><?php echo $row['bor_description'];?> </p>
 <p><img class="img-thumbnail" src="<?php echo 'imgbor/' . $row['bor_image']; ?>" alt=""></p>
 <?php
}

?>
