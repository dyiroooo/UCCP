<?php
include 'dbcon.php';

if(isset($_POST['btnxoedit'])) {
  $id = mysqli_real_escape_string($con, $_POST['editxoid']);
  $name = mysqli_real_escape_string($con, $_POST['editxoname']);
  $position = mysqli_real_escape_string($con, $_POST['editxoposition']);
  $description = mysqli_real_escape_string($con, $_POST['editxodescription']);
  $image = $_FILES['editxoimage'];

  if($_FILES['editxoimage']['name'] == ""){
      //echo "<script> alert('Image does not exist'); </script>";
      $query = "UPDATE uccp_xo_tbl SET xo_name = '$name', xo_position = '$position', xo_description ='$description' WHERE id = '$id' ";
      $query_run = mysqli_query($con,$query);
      echo "<script> setTimeout(() => {
          window.location.href = 'executiveoffices.php'
      },.1); </script>";
  }else{
      $filename = $_FILES['editxoimage']['name'];
      $size = $_FILES['editxoimage']['size'];
      $tmp_name = $_FILES['editxoimage']['tmp_name'];

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

              move_uploaded_file($tmp_name, 'imgxo/' . $newImageName );

              echo '<script> alert("Successful");</script>';
              $query = "UPDATE uccp_xo_tbl SET xo_name = '$name', xo_position = '$position', xo_description ='$description', xo_image='$newImageName' WHERE id = '$id' ";
              $query_run = mysqli_query($con,$query);

              echo "<script> setTimeout(() => {
                  window.location.href = 'executiveoffices.php'
              },.1); </script>";

          }
        }
      }
?>
