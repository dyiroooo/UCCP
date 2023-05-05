<?php
include '../include/config.php';

if(isset($_POST['update_id'])) {

  $id =  $_POST['update_id'];

  $query = "SELECT * FROM uccp_coursefee WHERE id = '$id'";
  $query_run = mysqli_query($conn, $query);

  while($course=mysqli_fetch_array($query_run)){
    $id = $course['id'];
    $type = $course['type'];
    $courses = $course['courses'];
    $yearlevel = $course['yearlevel'];
    $price = $course['price'];
    //$totalprice = $course['totalprice'];
  }

 ?>
<form enctype="multipart/form-data">
  <div class="form-group">
    <input type="hidden" name="update_id" id="update_id" class="form-control" value="<?= $id ?>">
  </div>
  <div class="form-group">
    <label for="recipient-name" class="col-form-label">Type</label>
    <input type="text" name="update_type" id="update_type" class="form-control" value="<?= $type ?>">
  </div>
  <!-- <div class="form-group">
    <label for="recipient-name" class="col-form-label">Course</label>
    <input type="text" name="update_course" id="update_course" class="form-control" value="<?= $courses ?>">
  </div>
  <div class="form-group">
    <label for="recipient-name" class="col-form-label">Year</label>
    <input type="text" name="update_yearlevel" id="update_yearlevel" class="form-control"value="<?= $yearlevel ?>">
  </div> -->
  <div class="form-group">
    <label for="recipient-name" class="col-form-label">Price</label>
    <input type="number" name="update_totalprice" id="update_totalprice" class="form-control" value="<?= $price ?>">
  </div>
</form>
<?php
}
 ?>
