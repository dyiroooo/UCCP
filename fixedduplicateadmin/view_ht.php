<?php
include 'dbcon.php';
$htid = $_POST['htid'];

 $query = "SELECT * FROM uccp_ht_tbl WHERE id = '$htid'";
 $query_run = mysqli_query($con,$query);

 while($row = mysqli_fetch_array($query_run)){
 ?>
 <label class="fw-bold">Highlights Title</label>
 <p><?php echo $row['ht_title'];?> </p>
 <p><img class="img-thumbnail" src="<?php echo 'imght/' . $row['ht_image']; ?>" alt=""></p>
 <?php
}

?>
