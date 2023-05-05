<?php
include '../include/config.php';

if(isset($_POST['input_id'])){

$id = $_POST['input_id'];

	$sql1 = "SELECT * FROM `uccp_admission_billing` WHERE id = '$id'";
	$sql = mysqli_query($conn,$sql1);
	while($r = mysqli_fetch_assoc($sql)){
			$c = $r['id'];
			$name = $r['Name'];
}

 ?>
<form enctype="multipart/form-data">
  <div class="form-group">
    <input type="hidden" name="input_id" id="input_id" class="form-control" value="<?php echo $c; ?>">
  </div>

  <div class="form-group">
  <input type="text" name="name" id="name" class="form-control" value="<?php echo $name; ?>">
  </div>

  <div class="form-group">
		<?php
		$query2 = "SELECT id FROM `uccp_admission_billing`";
		$result2 = mysqli_query($conn,$query2);
		while($row = mysqli_fetch_assoc($result2)){
		$orid = $row['id'];
		}
        $orid = rand();
        $ornumber = "OR-" . $orid;
    ?>
		<label for="" class="col-form-label">OR Number</label><br>
		<input type="text" name="ornumber_id" id="ornumber_id" class="form-control" value="<?php echo $ornumber; ?>" readonly>

    <label for="" class="col-form-label">Type</label><br>
    <select class="form-control" name="course_id" id="course_id">
		<?php
		$sql = "SELECT * FROM uccp_coursefee where type = 'admission' ";
		$result = mysqli_query($conn,$sql);
		    while($row = mysqli_fetch_assoc($result)){
				$u = $row['price'];
				echo '<option>'.$row['type'].'</option>';
			}
		?>
      </select>
    <label for="" class="col-form-label">Price</label>
		<input type="text" class="form-control text-right" name="total_price"  id="price" value="<?php echo "$u"; ?>" readonly>
  </div>
</form>
<?php
  }
 ?>
