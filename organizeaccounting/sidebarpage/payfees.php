<?php
include '../include/config.php';

if(isset($_POST['inputenroll_id'])) {

  $id =  $_POST['inputenroll_id'];

  $query = "SELECT * FROM `uccp_enrollment_billing` WHERE id = '$id'";
  $query_run = mysqli_query($conn, $query);
  while($r = mysqli_fetch_assoc($query_run)){
      $id = $r['id'];
      $name = $r['name'];
      $totalprice = $r['totalprice'];
      $balance = $r['balance'];
      $payfee = $r['payable_fee'];
      $orenumber = $r['ornumber'];
}

 ?>
 <form enctype="multipart/form-data" name = "billing">
   <div class="form-group">
     <input type="hidden" name="inputenroll_id" id="ids" class="form-control" value="<?php echo $id; ?>">
   </div>

   <div class="form-group">
   <label for="" class="col-form-label">Student Name</label><br>
   <input type="text" name="name" id="name_id" class="form-control" value="<?php echo $name; ?>" readonly>

 	<label for="" class="col-form-label">OR Number</label><br>
 	<input type="text" name="orenumber_id" id="orenumber_id" class="form-control" value="<?php echo $orenumber; ?>" readonly>

    <label for="" class="col-form-label">Balance</label><br>
    <input type="text" name="balance" id="balance" class="form-control" value="<?php echo $balance; ?>" readonly>

    <label for="" class="col-form-label">Amount</label><br>
    <input type="number" name="payfees" id="payfees" class="form-control" value="<?php echo $payfee; ?>">

    <input type="hidden" name="update" id="update" class="form-control" value = "<?php echo $balance; ?>">
    
   </div>
 </form>
<?php
}
 ?>

