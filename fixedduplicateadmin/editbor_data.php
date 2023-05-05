<?php
include 'dbcon.php';

if(isset($_POST['btnboredit'])) {
  $id = mysqli_real_escape_string($con, $_POST['editborid']);
  $name = mysqli_real_escape_string($con, $_POST['editborname']);
  $position = mysqli_real_escape_string($con, $_POST['editborposition']);
  $description = mysqli_real_escape_string($con, $_POST['editbordescription']);
  $image = $_FILES['editborimage'];

  if($_FILES['editborimage']['name'] == ""){
      //echo "<script> alert('Image does not exist'); </script>";
      $query = "UPDATE uccp_bor_tbl SET bor_name = '$name', bor_position = '$position', bor_description ='$description' WHERE id = '$id' ";
      $query_run = mysqli_query($con,$query);
      echo "<script> setTimeout(() => {
          window.location.href = 'boardofregents.php'
      },.1); </script>";
  }else{
      $filename = $_FILES['editborimage']['name'];
      $size = $_FILES['editborimage']['size'];
      $tmp_name = $_FILES['editborimage']['tmp_name'];

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

              move_uploaded_file($tmp_name, 'imgbor/' . $newImageName );

              echo '<script> alert("Successful");</script>';
              $query = "UPDATE uccp_bor_tbl SET bor_name = '$name', bor_position = '$position', bor_description ='$description', bor_image='$newImageName' WHERE id = '$id' ";
              $query_run = mysqli_query($con,$query);

              echo "<script> setTimeout(() => {
                  window.location.href = 'boardofregents.php'
              },.1); </script>";

          }
        }
      }
?>
