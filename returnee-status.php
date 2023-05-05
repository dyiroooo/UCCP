<?php
include('config.php');

    if(isset($_POST['returnee'])){


      $sql="SELECT status FROM  `uccp_enrollment_schedule`  ";
      $result = mysqli_query($conn,$sql);


      while($row = mysqli_fetch_assoc($result)){
          $u = $row['status'];


            if($u == 'Open'){
                echo "<script> window.location='returneeenrollmentform.php'</script>";
              }

              }

              $sqls="SELECT status FROM  `uccp_enrollment_schedule` WHERE status = 'Closed' ";
              $results = mysqli_query($conn,$sqls);


              while($rows = mysqli_fetch_assoc($results)){
                  $x = $rows['status'];

                  if ($x == 'Closed'){
                      echo "<script> alert('Enrollment is Closed')</script>";
                    echo "<script> window.location='index.php'</script>";

                      }
                    }

                    $sqls="SELECT status FROM  `uccp_enrollment_schedule` WHERE status = '0' ";
                    $results = mysqli_query($conn,$sqls);


                    while($rows = mysqli_fetch_assoc($results)){
                        $x = $rows['status'];


                        if ($x == '0'){
                            echo "<script> alert('Enrollment is NOT YET OPEN')</script>";
                          echo "<script> window.location='index1.php'</script>";


                            }



                          }



            }
