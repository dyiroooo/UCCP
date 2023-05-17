<?php
include '../include/config.php';

if (isset($_POST['update_id'])) {

    $id =  $_POST['update_id'];

    $query = "SELECT * FROM uccp_approvedcurriculum WHERE id = '$id'";
    $query_run = mysqli_query($conn, $query);

    while ($course = mysqli_fetch_array($query_run)) {
        $id = $course['id'];
        $subcode = $course['Subcode'];
        $details = $course['Description'];
        $schoolyear = $course['Schoolyear'];
        $bscourse = $course['Course'];
        $sem = $course['Sem'];
        $price = $course['Price'];
    }

?>
    <form enctype="multipart/form-data">
        <div class="form-group">
            <input type="hidden" name="update_id" id="update_id" class="form-control" value="<?= $id ?>">
        </div>
        <div class="form-group">
            <label for="recipient-name" class="col-form-label">Sub Code</label>
            <input type="text" readonly name="" id="" class="form-control" value="<?= $subcode ?>">
        </div>
        <div class="form-group">
            <label for="recipient-name" class="col-form-label">Details</label>
            <input type="text" readonly name="" id="" class="form-control" value="<?= $details ?>">
        </div>
        <div class="form-group">
            <label for="recipient-name" class="col-form-label">School Year</label>
            <input type="text" readonly name="" id="" class="form-control" value="<?= $schoolyear ?>">
        </div>
        <div class="form-group">
            <label for="recipient-name" class="col-form-label">Course</label>
            <input type="text" readonly name="" id="" class="form-control" value="<?= $bscourse ?>">
        </div>
        <div class="form-group">
            <label for="recipient-name" class="col-form-label">Semester</label>
            <input type="text" readonly name="" id="" class="form-control" value="<?= $sem ?>">
        </div>
        <div class="form-group">
            <label for="recipient-name" class="col-form-label">Price</label>
            <input type="number" name="updatePrice" id="updatePrice" class="form-control" value="<?= $price ?>" placeholder="Price">
        </div>
    </form>
<?php
}
?>