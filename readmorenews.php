<?php
include 'config.php';

if (isset($_GET['idnews'])) {
  $newsselectedid = $_GET['idnews'];
  $title = $_GET['titlenews'];
}


?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
  <meta charset="utf-8">
  <link rel="stylesheet" href="styles.css">
  <link rel="icon" href="favicon.ico">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">
  <title><?php echo $title ?></title>
</head>
<body>

  <nav class="navbar navbar-expand-lg navbar-light" style="background-color: #FF8303;">
    <div class="container-fluid">
      <a class="navbar-brand mx-lg-5 mx-m-5 mx-sm-5" href="index.php">
        <img src="UCCLOGO.png" alt="" width="75" height="75">
      </a>
      
    </div>
  </nav>

  <div class="container mt-5">
    <article class="container">
      <?php
      $query = "SELECT * FROM uccp_news_tbl WHERE id = '$newsselectedid'";
      $query_run = mysqli_query($conn, $query);
      while($newsrow = mysqli_fetch_array($query_run)) {
        $newsimg = $newsrow['imgdir'];
        $title = $newsrow['title'];
        $author = $newsrow['author'];
        $content = $newsrow['body'];
        ?>
        <h1 hidden><?php echo $newsselectedid; ?></h1>
        <h1 class="display-1"><?php echo $title; ?></h1>
        <h4> <?php echo 'by ' . $author; ?></h4>
        <p class="lead"><?php echo $content; ?></p>
        <img src="<?php echo 'fixedduplicateadmin/imgnews/' . $newsimg; ?>">
        <?php
      }
      ?>
    </article>
  </div>

</body>
</html>
