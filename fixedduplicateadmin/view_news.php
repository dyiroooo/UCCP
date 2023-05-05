 <?php
include 'dbcon.php';
$newsid = $_POST['newsid'];

  $query = "SELECT * FROM uccp_news_tbl WHERE id = '$newsid'";
  $query_run = mysqli_query($con,$query);

  while($news = mysqli_fetch_array($query_run)){
  ?>
  <label class="fw-bold">Title</label>
  <p><?php echo $news['title'];?> </p>
  <label class="fw-bold">Author</label>
  <p><?php echo $news['author'];?> </p>
  <label class="fw-bold">Content</label>
  <p><?php echo $news['body'];?> </p>
  <p><img class="img-thumbnail" src="<?php echo 'imgnews/' . $news['imgdir']; ?>" alt=""></p>
  <?php
}

 ?>
