<?php
include 'dbcon.php';
$xoid = $_POST['xoid'];

 $query = "SELECT * FROM uccp_xo_tbl WHERE id = '$xoid'";
 $query_run = mysqli_query($con,$query);

 while($row = mysqli_fetch_array($query_run)){
 ?>
 <label class="fw-bold">Executive Office Member Name</label>
 <p><?php echo $row['xo_name'];?> </p>
 <label class="fw-bold">Executive Office Position</label>
 <p><?php echo $row['xo_position'];?> </p>
 <label class="fw-bold">Executive Office Description</label>
 <p><?php echo $row['xo_description'];?> </p>
 <p><img class="img-thumbnail" src="<?php echo 'imgxo/' . $row['xo_image']; ?>" alt=""></p>
 <?php
}

?>
