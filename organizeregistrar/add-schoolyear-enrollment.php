<?php
            include('include/config.php');
            if(isset($_POST['sy1'])){
              $sy1 = $_POST['sy1'];

              $sql="SELECT schoolyear FROM  `uccp_enrollment_schedule` WHERE schoolyear = '$sy1' ";
              $result = mysqli_query($conn,$sql);

              $rows = mysqli_num_rows($result);

              if($rows > 0){
               echo $rows;
              }else {
                $sql = mysqli_query($conn,"INSERT INTO `uccp_enrollment_schedule` (`schoolyear`,`status`,`sem`) VALUES ('$sy1','0','0')");
                unset($_POST);
                // echo "<script> window.location='ENROLLMENT-SCHEDULING.php'</script>";
              }

            }
            ?>