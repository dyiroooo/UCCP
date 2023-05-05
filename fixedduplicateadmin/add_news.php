<?php

include 'dbcon.php';

//Create News Query
if(isset($_POST['btnpostnews'])) {
//non-image news details
$title = mysqli_real_escape_string($con, $_POST['newstitle']);
$author = mysqli_real_escape_string($con, $_POST['newsauthor']);
$content = mysqli_real_escape_string($con, $_POST['newscontent']);
//upload image
$filename = $_FILES['imgreceiver']['name'];
$size = $_FILES['imgreceiver']['size'];
$tmp_name = $_FILES['imgreceiver']['tmp_name'];

$validImageExtension = ['jpg', 'jpeg', 'png'];
$imageExtension = explode('.', $filename);
$imageExtension = strtolower(end($imageExtension));
    if ($_FILES['imgreceiver']['name'] == "") {
        $querynoimage = "INSERT INTO uccp_news_tbl (author, title, body) VALUES ('$author', '$title', '$content')";
      $query_run = mysqli_query($con, $querynoimage);
    }
    else if(!in_array($imageExtension,$validImageExtension)){
        echo "<script> alert('Invalid Image Extension'); </script>";
    }
    else if($size > 512000){
        echo "<script> alert('Size too large'); </script>";
    }else{
        $newImageName = uniqid();
        $newImageName .= '.' . $imageExtension;
        move_uploaded_file($tmp_name, 'imgnews/' . $newImageName );
      }

  $query = "INSERT INTO uccp_news_tbl (author, title, body, imgdir) VALUES ('$author', '$title', '$content', '$newImageName')";
  $query_run = mysqli_query($con, $query);
  

  if ($query_run) {
    echo "<script>window.location.href='newsmanagement.php'</script>";
  } else {
    echo "<script>window.location.href='newsmanagement.php'</script>";
  }
}


 ?>
