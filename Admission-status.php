<?php
include('config.php');

    if(isset($_POST['Admit'])){


      $sql="SELECT status FROM  `uccp_admission_schedule`  ";
      $result = mysqli_query($conn,$sql);


      while($row = mysqli_fetch_assoc($result)){
          $u = $row['status'];

            if($u == 'Open'){
                echo "<script> window.location='admissionform.php'</script>";
              }
              }

              $sqls="SELECT status FROM  `uccp_admission_schedule` WHERE status = 'Closed'; ";
              $results = mysqli_query($conn,$sqls);

              while($rows = mysqli_fetch_assoc($results)){
                  $x = $rows['status'];

                  if ($x == 'Closed'){
                      echo "<script> alert('Admission Closed')</script>";
                      echo "<script> window.location='index.php'</script>";
                      }
                    }

                    $sqls="SELECT status FROM  `uccp_admission_schedule` WHERE status = '0'; ";
                    $results = mysqli_query($conn,$sqls);


                    while($rows = mysqli_fetch_assoc($results)){
                        $x = $rows['status'];

                        if ($x == '0'){
                            echo "<script> alert('Admission is NOT YET OPEN')</script>";
                          echo "<script> window.location='index1.php'</script>";


                            }
                          }
            }







          //
          // while($row = mysqli_fetch_assoc($result)){
          //     $u = $row['status'];
          //
          //
          //       if($u == '1'){
          //           echo "<script> window.location='Admissionform.php'</script>";
          //         }
          //
          //         else if ($u == '2'){
          //
          //         }
          //
          //          else {
          //               echo "<script> alert('tangina')</script>";
          //             echo "<script> window.location='index1.php'</script>";
          //
          //         }
          //
          //
          //       }
          //
          //
          //
          //     }





    //   $rows= mysqli_fetch_assoc($result);
    //
    //   $u=$rows['status'];
    //
    //   if($u == "1"){
    //     echo "<script> window.location.href ='Admissionform.php'</script>";
    //   }
    //   else if($u =="2") {
    //
    //       echo "<script> window.location.href ='index1.php'</script>";
    //
    //   }
    //
    // }

 ?>
