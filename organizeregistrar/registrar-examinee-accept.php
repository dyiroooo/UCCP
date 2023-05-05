<?php

  include ("include/config.php");

if(isset($_POST['accept1'])){
  $id = $_POST['accept1'];

  $query = "INSERT INTO `uccp_passers`(`id`, `Name`, `Gender`, `Birthday`, `Birthplace`, `Number`, `Email`, `Address`, `Guardian`, `G-Occupation`, `G-Contact`, `G-Adress`, `Primary`, `Primary-Sy`, `Highschool`, `Highschool-Sy`, `Shs`, `Shs-Sy`,
    `Firstchoice`, `Requirements`, `Picture`, `Proof`, `Card`, `Schoolyear`) SELECT `id`, `Name`, `Gender`, `Birthday`, `Birthplace`, `Number`, `Email`, `Address`, `Guardian`, `G-Occupation`, `G-Contact`, `G-Adress`,
     `Primary`, `Primary-Sy`, `Highschool`,`Highschool-Sy`, `Shs`, `Shs-Sy`, `Firstchoice`, `Requirements`, `Picture`, `Proof`, `Card`, `Schoolyear` FROM `uccp_examinees` WHERE id = '$id';";
     mysqli_query($conn,$query);

  $query1 = "DELETE FROM `uccp_examinees` WHERE id = '$id';";
   mysqli_query($conn,$query1);
}


 ?>
