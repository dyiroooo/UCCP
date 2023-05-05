<?php
include '../include/config.php';

if(isset($_POST['inputenroll_id'])) {

  $id =  $_POST['inputenroll_id'];

  $query = "SELECT * FROM `uccp_enrollment_billing` WHERE id = '$id'";
  $query_run = mysqli_query($conn, $query);
  while($r = mysqli_fetch_assoc($query_run)){
      $d = $r['id'];
      $name = $r['name'];
      $type = $r['feetype'];
      $price = $r['price'];
      $totalprice = $r['totalprice'];
}

 ?>
 <form enctype="multipart/form-data" name = "billing">
   <div class="form-group">
     <input type="hidden" name="inputenroll_id" id="ids" class="form-control" value="<?php echo $d; ?>">
   </div>

   <div class="form-group">
     <?php
 		$query2 = "SELECT id FROM `uccp_enrollment_billing`";
 		$result2 = mysqli_query($conn,$query2);
 		while($row = mysqli_fetch_assoc($result2)){
 		$orids = $row['id'];
 		}

    $orids = rand();
    $orenumber = "OR-" . $orids;
 ?>
   <label for="" class="col-form-label">Student Name</label><br>
   <input type="text" name="name" id="name_id" class="form-control" value="<?php echo $name; ?>" readonly>

 		<label for="" class="col-form-label">OR Number</label><br>
 		<input type="text" name="orenumber_id" id="orenumber_id" class="form-control" value="<?php echo $orenumber; ?>" readonly>

     <label for="" class="col-form-label">Fee Details</label><br>

    <table class ="table table-condensed table-bordered table-hover table-responsive" id = "tbbill">
      <thead>
        <th></th>
        <th class = "text-center">Fee Type</th>
        <th class = "text-center">Amount</th>
      </thead>
      <tbody>
        <?php
        $query = "SELECT * FROM uccp_coursefee WHERE type != 'Admission'";
        $query_run = mysqli_query($conn, $query);
          while ($course = mysqli_fetch_array($query_run)){
            $totalprice = $course['totalprice'];
            $price = $course['price'];
        
            ?>
            <tr>
              <td><input type= "checkbox" name="feetypes[]" id = "feetypes" class ="checkOne" value = "<?=$course['type']?> <br>" data-price="<?= $course['price']?>"></td>
              <td ><?=$course['type']?></td>
              <td><?= $course['price']?>.00</td>
              <input type= "hidden" name="prices" id ="prices" class = "checkOne" value="<?=$course['price']?> <br>">
            </tr>
          <?php
         }

         ?>
      </tbody>

    </table>
    <h4><span id='price' name = 'price[]' value = "<?php echo $price; ?>">0.00</span></h4>
    <h4><span id='total' name = 'total' value = "<?php echo $totalprice; ?>">₱ 0.00</span></h4>
    <input type="hidden" name = 'totalprice' id = 'totalprice' value = '<?php echo $totalprice;?>'>
   </div>
 </form>
<?php
}
 ?>

 <script>
  $(document).on("click", ".checkOne", function() {
  if ($(this).prop('checked') == true) {
    var price = $(this).attr("data-price");
    var prices = $('#price').val();
    var total = $('#total').val();
    var pricess = Number(price);
    var setprice = Number(price) + Number(total);
    var compute = Math.round(setprice * 100) / 100;

    $('#price').text(pricess + ".00");
    $('#price').val(pricess);
    $('#total').text(compute + ".00");
    $('#total').val(compute);
  } else if ($(this).prop('checked') == false) {
    var price = $(this).attr("data-price");
    var total = $('#total').val();
    var setprice = Number(total) - Number(price);
    var compute = Math.round(setprice * 100) / 100;

    $('#price').val(price);
    $('#total').text(compute + ".00");
    $('#total').val(compute);
  }
});
 </script>
