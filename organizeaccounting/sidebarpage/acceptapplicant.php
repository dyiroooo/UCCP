<?php
  include '../include/config.php';

  if(isset($_POST['acceptapp'])){
    $id = $_POST['acceptapp'];

    $query = "INSERT INTO `uccp_examinees`(`id`, `Name`, `Gender`, `Birthday`, `Birthplace`, `Number`, `Email`, `Address`, `Guardian`, `G-Occupation`, `G-Contact`, `G-Adress`, `Primary`, 
    `Primary-Sy`, `Highschool`, `Highschool-Sy`, `Shs`, `Shs-Sy`, `Firstchoice`, `Requirements`, `Picture`, `Proof`, `Card`, `Schoolyear`, `batch`, `category`, `gwarange`, 
    `schedule`, `room`, `size`, `syexisting`, `schedid`) SELECT `id`, `Name`, `Gender`, `Birthday`, `Birthplace`, `Number`, `Email`, `Address`, `Guardian`, `G-Occupation`, 
    `G-Contact`, `G-Adress`, `Primary`, `Primary-Sy`, `Highschool`,`Highschool-Sy`, `Shs`, `Shs-Sy`, `Firstchoice`, `Requirements`, `Picture`, `Proof`, `Card`, `Schoolyear`, '', 
    '', '', '', '', '', '', '' FROM `uccp_admission_billing` WHERE id = '$id';";
     mysqli_query($conn,$query);

       $query = "INSERT INTO `uccp_accpaidaddmission`(`id`, `name`,`ornumber`, `status`) SELECT `id`, `name`, `ornumber`, `status` FROM `uccp_admission_billing` WHERE id = '$id';";
        mysqli_query($conn,$query);

        $query = "UPDATE `uccp_accpaidaddmission` SET status = 'Paid'  WHERE id = '$id';";
         mysqli_query($conn,$query);

      $query1 = "DELETE FROM `uccp_admission_billing` WHERE id = '$id';";
        mysqli_query($conn,$query1);
      }
   ?>
