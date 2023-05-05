<?php

include 'dbcon.php';

//Create Home Template Query
if(isset($_POST['addbtnHT'])) {
//non-image news details
$title = mysqli_real_escape_string($con, $_POST['HTtitle']);
//upload image
$filename = $_FILES['HTimgreceiver']['name'];
$size = $_FILES['HTimgreceiver']['size'];
$tmp_name = $_FILES['HTimgreceiver']['tmp_name'];

$validImageExtension = ['jpg', 'jpeg', 'png'];
$imageExtension = explode('.', $filename);
$imageExtension = strtolower(end($imageExtension));
    if ($_FILES['HTimgreceiver']['name'] == "") {
      $querynoimage = "INSERT INTO uccp_ht_tbl (ht_title) VALUES ('$title')";

      //echo "<script> alert('Successful! Yet No Image Added'); </script>";
      if ($query_run = mysqli_query($con, $querynoimage) === TRUE) {

      } else {
          die ($con->error);
      }

    } else if(!in_array($imageExtension,$validImageExtension)){
        echo "<script> alert('Invalid Image Extension'); </script>";
    }
    else if($size > 512000){
        echo "<script> alert('Size too large'); </script>";
    }else{
        $newImageName = uniqid();
        $newImageName .= '.' . $imageExtension;
        move_uploaded_file($tmp_name, 'imght/' . $newImageName );

        $query = "INSERT INTO uccp_ht_tbl (ht_title, ht_image) VALUES ('$title',  '$newImageName')";
        $query_run = mysqli_query($con, $query);
      }

  if ($query_run) {
    echo "<script>window.location.href='hometemplate.php'</script>";
  } else {
    echo "<script>window.location.href='hometemplate.php'</script>";
  }
}


 ?>
