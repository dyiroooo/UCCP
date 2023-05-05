<?php
require 'dbcon.php';

//Create News Query
if(isset($_POST['addbtnMBOR'])) {
  //non-image news details
  $name = mysqli_real_escape_string($con, $_POST['MBORname']);
  $position = mysqli_real_escape_string($con, $_POST['MBORposition']);
  $description = mysqli_real_escape_string($con, $_POST['MBORdescription']);
  $level2 = 2; //1 is indication that the board member is a higher member of the board
  //upload image
  $filename = $_FILES['MBORimgreceiver']['name'];
  $size = $_FILES['MBORimgreceiver']['size'];
  $tmp_name = $_FILES['MBORimgreceiver']['tmp_name'];

  $validImageExtension = ['jpg', 'jpeg', 'png'];
  $imageExtension = explode('.', $filename);
  $imageExtension = strtolower(end($imageExtension));

  if ($_FILES['MBORimgreceiver']['name'] == "" || $size <= 0) {
    $query1 = "INSERT INTO uccp_bor_tbl (bor_name, bor_position, bor_description, bor_level) VALUES ('$name', '$position', '$description', '$level2')";
    if($query_run = mysqli_query($con, $query1)){
        
    }else{
        die($conn -> error);
    }
    echo "<script> alert('Successful'); </script>";
    if ($query_run) {
      echo "<script>window.location.href='boardofregents.php'</script>";
    } else {
      echo "<script>window.location.href='boardofregents.php'</script>";
    }
  }
  else if(!in_array($imageExtension,$validImageExtension)){
    echo "<script> alert('Invalid Image Extension'); </script>";
  }
  else if($size > 512000){
    echo "<script> alert('Size too large'); </script>";
  }
  else{
    $newImageName = uniqid();
    $newImageName .= '.' . $imageExtension;
    move_uploaded_file($tmp_name, 'imgbor/' . $newImageName );

      $query = "INSERT INTO uccp_bor_tbl (bor_name, bor_position, bor_description, bor_image, bor_level) VALUES ('$name', '$position', '$description', '$newImageName', '$level2')";
      $query_run = mysqli_query($con, $query);

      if ($query_run) {
        echo "<script>window.location.href='boardofregents.php'</script>";
      } else {
        echo "<script>window.location.href='boardofregents.php'</script>";
      }
  }

}


?>
