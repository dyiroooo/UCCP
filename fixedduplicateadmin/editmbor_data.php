<?php
include 'dbcon.php';

if(isset($_POST['btnmboredit'])) {
  $id = mysqli_real_escape_string($con, $_POST['editmborid']);
  $name = mysqli_real_escape_string($con, $_POST['editmborname']);
  $position = mysqli_real_escape_string($con, $_POST['editmborposition']);
  $description = mysqli_real_escape_string($con, $_POST['editmbordescription']);
  $level2 = 2; //2 is indication that the board member is a normal member of the board
  $image = $_FILES['editmborimage'];

  if($_FILES['editmborimage']['name'] == ""){
      //echo "<script> alert('Image does not exist'); </script>";
      $query = "UPDATE uccp_bor_tbl SET bor_name = '$name', bor_position = '$position', bor_description ='$description', bor_level ='$level2' WHERE id = '$id' ";
      $query_run = mysqli_query($con,$query);
      echo "<script> setTimeout(() => {
          window.location.href = 'boardofregents.php'
      },.1); </script>";
  }else{
      $filename = $_FILES['editmborimage']['name'];
      $size = $_FILES['editmborimage']['size'];
      $tmp_name = $_FILES['editmborimage']['tmp_name'];

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
              $query = "UPDATE uccp_bor_tbl SET bor_name = '$name', bor_position = '$position', bor_description ='$description', bor_image='$newImageName', bor_level ='$level2' WHERE id = '$id' ";
              $query_run = mysqli_query($con, $query);

              echo "<script> setTimeout(() => {
                  window.location.href = 'boardofregents.php'
              },.1); </script>";

          }
        }
      }
?>
