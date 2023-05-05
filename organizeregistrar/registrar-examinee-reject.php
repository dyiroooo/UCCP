<?php

  include ("include/config.php");

if(isset($_POST['reject1'])){
  $id = $_POST['reject1'];

    $query = "DELETE FROM `uccp_examinees` WHERE id = '$id';";
    mysqli_query($conn,$query);
}

 ?>
