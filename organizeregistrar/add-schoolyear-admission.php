
<?php
                include('include/config.php');
                if(isset($_POST['sy'])){
                  $sy = $_POST['sy'];

                  $sql="SELECT schoolyear FROM  `uccp_admission_schedule` WHERE schoolyear = '$sy' ";
                  $result = mysqli_query($conn,$sql);
                  $rows = mysqli_num_rows($result);
                  if($rows > 0){
                    // echo "<script> alert('SCHOOLYEAR ALREADY EXIST')</script>";
                  }else {
                    $sql = mysqli_query($conn,"INSERT INTO `uccp_admission_schedule`(`schoolyear`,`status`) VALUES ('$sy','0')");
                    unset($_POST);
                    // echo "<script> window.location='ADMISSION-SCHEDULING.php'</script>";
                  }
                }
                ?>
