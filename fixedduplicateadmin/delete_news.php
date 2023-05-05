<?php
include 'dbcon.php';

if(isset($_POST['del_newsid'])) {

  $id =  $_POST['del_newsid'];

  $query = "SELECT * FROM uccp_news_tbl WHERE id = '$id'";
  $query_run = mysqli_query($con, $query);

  while($news=mysqli_fetch_array($query_run)){
    $id = $news['id'];
  }

 ?>

 <input type="hidden" name="newsremove" id="newsremove" value="<?= $id ?>">
 <p>Are you sure you want to delete this News?</p>
<?php
}
 ?>
