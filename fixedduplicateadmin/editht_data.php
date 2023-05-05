<?php
include 'dbcon.php';

if(isset($_POST['btnhtedit'])) {
  $id = mysqli_real_escape_string($con, $_POST['edithtid']);
  $title = mysqli_real_escape_string($con, $_POST['edithttitle']);
  $image = $_FILES['edithtimage'];

  if($_FILES['edithtimage']['name'] == ""){
      //echo "<script> alert('Image does not exist'); </script>";
      $query = "UPDATE uccp_ht_tbl SET ht_title = '$title' WHERE id = '$id' ";
      $query_run = mysqli_query($con,$query);
      echo "<script> setTimeout(() => {
          window.location.href = 'hometemplate.php'
      },.1); </script>";
  }else{
      $filename = $_FILES['edithtimage']['name'];
      $size = $_FILES['edithtimage']['size'];
      $tmp_name = $_FILES['edithtimage']['tmp_name'];

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

              move_uploaded_file($tmp_name, 'imght/' . $newImageName );

              echo '<script> alert("Successful");</script>';
              $query = "UPDATE uccp_ht_tbl SET ht_title = '$title', ht_image='$newImageName' WHERE id = '$id' ";
              $query_run = mysqli_query($con,$query);

              echo "<script> setTimeout(() => {
                  window.location.href = 'hometemplate.php'
              },.1); </script>";

          }
        }
      }
?>
