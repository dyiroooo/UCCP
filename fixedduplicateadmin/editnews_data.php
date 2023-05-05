<?php
include 'dbcon.php';

if(isset($_POST['btneditnews'])) {
  $id = mysqli_real_escape_string($con, $_POST['editnewsid']);
  $author = mysqli_real_escape_string($con, $_POST['editnewsauthor']);
  $title = mysqli_real_escape_string($con, $_POST['editnewstitle']);
  $content = mysqli_real_escape_string($con, $_POST['editnewscontent']);
  $image = $_FILES['editnewsimage'];

  if($_FILES['editnewsimage']['name'] == ""){
      //echo "<script> alert('Image does not exist'); </script>";
      $query = "UPDATE uccp_news_tbl SET author = '$author', title = '$title', body ='$content' WHERE id = '$id' ";
      $query_run = mysqli_query($con,$query);
      echo "<script> setTimeout(() => {
          window.location.href = 'newsmanagement.php'
      },.1); </script>";
  }else{
      $filename = $_FILES['editnewsimage']['name'];
      $size = $_FILES['editnewsimage']['size'];
      $tmp_name = $_FILES['editnewsimage']['tmp_name'];

      $validImageExtension = ['jpg', 'jpeg', 'png'];
      $imageExtension = explode('.', $filename);
      $imageExtension = strtolower(end($imageExtension));
          if(!in_array($imageExtension,$validImageExtension)){
              echo "<script> alert('Invalid Image Extension'); </script>";
          }
          else if($size > 512000){
              echo "<script> alert('Size too large'); </script>";
          }else{
              $newImageName = uniqid();
              $newImageName .= '.' . $imageExtension;

              move_uploaded_file($tmp_name, 'imgnews/' . $newImageName );
              // $targer_dir="webimg/";
              // $targer_file=$targer_dir.$filename;
              // $filetype=strtolower(strtolower(pathinfo($targer_file,PATHINFO_EXTENSION)));
              echo '<script> alert("Successful");</script>';
              $query = "UPDATE uccp_news_tbl SET author = '$author', title = '$title', body ='$content', imgdir='$newImageName' WHERE id = '$id' ";
              $query_run = mysqli_query($con,$query);

              echo "<script> setTimeout(() => {
                  window.location.href = 'newsmanagement.php'
              },.1); </script>";

          }
        }
      }
?>
