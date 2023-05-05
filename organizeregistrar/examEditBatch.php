<?php
include('include/config.php');

$bid = $_POST['batchid'];

$query = "SELECT * FROM uccp_examsched WHERE id = '$bid' ";
$query_run = mysqli_query($conn, $query);

while ($row = mysqli_fetch_array($query_run)) {
    $id = $row['id'];
    $batch = $row['batch'];
    $category = $row['category'];
    $gwa = $row['gwarange'];
    $sched = date("Y-m-d", strtotime($row['schedule']));
    $room = $row['room'];
    $size = $row['size'];
    $sy = $row['syexisting'];


?>
            <div class="mb-3">
              <input type="text" id="editID" hidden name="" value="<?=$id?>">
              <label for="" class="form-label"><b>Schoolyear: </b><?= $sy ?>
              <br>
              <br><b>Batch</b></label>
              <input type="number" class="form-control" id="editBatchNo" value ="<?php echo $batch;?>"  placeholder=""> </input>

              <label for="" class="form-label"><b>Category</b></label>
              <input type="text" class="form-control" id="editCategory" value="<?=$category?>"  placeholder=""> </input>

              <label for="" class="form-label"><b>GWA</b></label>
              <input type="int" class="form-control" id="editGWA" value="<?=$gwa?>"  placeholder=""> </input>

              <label for="" class="form-label"><b>Schedule</b></label>
              <input type="date" class="form-control" id="editSched" value="<?=$sched?>"  placeholder=""> </input>

              <label for="" class="form-label"><b>Room</b></label>
              <input type="text" class="form-control" id="editRoom" value="<?=$room?>"  placeholder=""> </input>

              <label for="" class="form-label"><b>Size</b></label>
              <input type="number" class="form-control" id="editSize" value="<?=$size?>"  placeholder=""> </input>
            </div>
<?php

}


?>
