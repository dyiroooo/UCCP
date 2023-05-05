<?php
require 'dbcon.php';

//Create News Query
if(isset($_POST['addbtnXO'])) {
//non-image news details
$name = mysqli_real_escape_string($con, $_POST['XOname']);
$position = mysqli_real_escape_string($con, $_POST['XOposition']);
$description = mysqli_real_escape_string($con, $_POST['XOdescription']);
//upload image
$filename = $_FILES['XOimgreceiver']['name'];
$size = $_FILES['XOimgreceiver']['size'];
$tmp_name = $_FILES['XOimgreceiver']['tmp_name'];

$validImageExtension = ['jpg', 'jpeg', 'png'];
$imageExtension = explode('.', $filename);
$imageExtension = strtolower(end($imageExtension));
    if ($_FILES['XOimgreceiver']['name'] == "") {
    $querynoimage = "INSERT INTO uccp_xo_tbl (xo_name, xo_position, xo_description) VALUES ('$name', '$position', '$description')";
    if ($query_run = mysqli_query($con, $querynoimage) === TRUE) {
      } else {
          die ($con->error);
      }
    }
    else if(!in_array($imageExtension,$validImageExtension)){
        echo "<script> alert('Invalid Image Extension'); </script>";
    }
    else if($size > 512000){
        echo "<script> alert('Size too large'); </script>";
    }else{
        $newImageName = uniqid();
        $newImageName .= '.' . $imageExtension;
        move_uploaded_file($tmp_name, 'imgxo/' . $newImageName );
      }
?>

<?php
  $query = "INSERT INTO uccp_xo_tbl (xo_name, xo_position, xo_description, xo_image) VALUES ('$name', '$position', '$description', '$newImageName')";
  $query_run = mysqli_query($con, $query);
  move_uploaded_file($filetmp,$target_file);

  if ($query_run) {
    echo "<script>window.location.href='executiveoffices.php'</script>";
  } else {
    echo "<script>window.location.href='executiveoffices.php'</script>";
  }
}


 ?>
