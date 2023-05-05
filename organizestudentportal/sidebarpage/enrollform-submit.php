<?php
ini_set('display_errors',1);
session_start();
$section = $_SESSION['section'];
$sems = $_SESSION['sem'];
$sy = $_SESSION['schoolyear'];


include '../include/config.php';

    if(isset($_POST['enrollsubmit'])){
      $id= $_POST['id'];         
      $lastname = $_POST['lname'];
      $middlename = $_POST['mname'];
      $firstname = $_POST['gname'];
      $birthday = $_POST['birthday'];
      $bdplace = $_POST['bdplace'];
      $email = $_POST['emailadd'];
      $phone = $_POST['phoneno'];
      $gender = $_POST['gender'];
      $haddress = $_POST['haddress'];
      $course = $_POST['course'];
      $year = $_POST['Yearlevel'];
      $schoolyear = $_POST['Schoolyear'];
      $sem = $_POST['Sem'];

      $fullname = $firstname." ".$middlename." ".$lastname;
      
 $sqle="SELECT status FROM  `uccp_enrollment_schedule` WHERE status = 'Open' ";
      $result = mysqli_query($conn,$sqle);

$u='';
      while($row = mysqli_fetch_assoc($result)){
          $u = $row['status'];
}

            if($u == 'Open'){

                $s = mysqli_query($conn, "SELECT * FROM uccp_eval WHERE name = '$fullname' AND schoolyear = '$sy' And sem ='$sems' AND section ='$section' "); ///binago ko di pa ako sure
                $num_row = mysqli_num_rows($s);
   
      
            if($num_row > 0){
      
                $r = mysqli_query($conn, "SELECT * FROM uccp_eval WHERE name ='$fullname' AND email='$email'  AND remarks ='FAILED'"); ///binago ko di pa ako sure
                $num_rowss = mysqli_num_rows($r);
                    
                    
                
                if($num_rowss > 0 ){
                  echo '<script>alert("YOU CANT ENROLL BECAUSE YOU DIDNT PASS THE PREVIOUS SEMESTER")</script>';
        
                  echo '<script type="text/javascript"> window.location="../studentportal.php";</script>';
                    return;
                }

      
                $result = mysqli_query($conn,"SELECT name,birthday,email FROM uccp_enrollee WHERE name='$fullname' AND birthday='$birthday' AND email='$email'");
                $num_rows = mysqli_num_rows($result);

                if($num_rows > 0){ //validation in submission
                    echo '<script>alert("YOU ALREADY SUBMIT ENROLLMENT FORM")</script>';
                    echo '<script type="text/javascript"> window.location="../studentportal.php";</script>';
                    return;
                  }

                  $targetdir= "../../images/";

                  $erf = $_FILES['erf']['name'];
                  $records = $_FILES['records']['name'];

                  $e = implode(',',$erf);
                  $r = implode(',',$records);

                  $targer_file_e= $targetdir.$e;
                  $targer_file_r= $targetdir.$r;

                  $filetype_erf=strtolower(strtolower(pathinfo($targer_file_e,PATHINFO_EXTENSION)));
                  $filetype_rec=strtolower(strtolower(pathinfo($targer_file_r,PATHINFO_EXTENSION)));

                  $totalFileSize_erf = array_sum($_FILES['erf']['size']);
                  $totalFileSize_rec = array_sum($_FILES['records']['size']);

                  $milliseconds = floor(microtime(true) * 1000);
                  $millisecondss = floor(microtime(true) * 3000);

                  if($totalFileSize_erf  || $totalFileSize_rec > 0){
                        if($totalFileSize_erf > 5120000){
                          echo '<script type="text/javascript">window.location="../studentportal.php";alert("File size too big")</script>';
                          return;
                      }
                      if($totalFileSize_rec > 5120000){
                        echo '<script type="text/javascript">window.location="../studentportal.php";alert("File size too big")</script>';
                        return;
                    }
                }


                    if($filetype_erf != "jpg" && $filetype_erf != "png" && $filetype_erf != "jpeg" && $filetype_erf != "gif" ) {
                        echo '<script type="text/javascript">window.location="../studentportal.php"; alert("Wrong Input")</script>';
                        return;
                      }

                    if( $filetype_rec != "jpg" &&  $filetype_rec != "png" &&  $filetype_rec != "jpeg" &&  $filetype_rec != "gif" ) {
                        echo '<script type="text/javascript">window.location="../studentportal.php"; alert("Wrong Input")</script>';
                        return;
                        }

                      $e='';
                          if(!empty($erf)){
                                foreach ($erf as $key => $val) {
                                $targetFilepath = $targetdir.$milliseconds.$val;
                                $e.= $milliseconds.$val;
                                move_uploaded_file($_FILES['erf']['tmp_name'][$key], $targetFilepath);
                                }
                                
                                $r = mysqli_query($conn, "SELECT * FROM uccp_enrolled WHERE id = '$id'");
                                
                                
                                $query2 = "SELECT * FROM uccp_enrolled WHERE id= '$id';";
                                $query_run1 = mysqli_query($conn, $query2);
                        
                                while($row =mysqli_fetch_array($query_run1)){
                                    $picture = $row['picture'];
                                    $diploma = $row['diploma'];
                                    $goodmoral = $row['goodmoral'];
                                    $psa = $row['psa'];
                                    $card = $row['card'];
                                    $proof = $row['proof'];
                               
                                $sql1 = "INSERT INTO `uccp_enrollee` (`id`,`name`, `gender`, `birthday`, `birthplace`, `email`, `phone`, `address`, `course`, `year`,`section`,`schoolyear`,`sem`,`picture`,`diploma`, `goodmoral`,`psa`,`card`,`proof`, `erf`, `records`, `status`,`username`,`password`,`account_type`)
                                VALUES ('$id','$fullname','$gender','$birthday', '$bdplace', '$email', '$phone', '$haddress', '$course', '$year','','$schoolyear','$sem','$picture', '$diploma', '$goodmoral' ,'$psa','$card','$proof','$e','','','','','');";
                                $result = mysqli_query($conn,$sql1);
                                    }
                                }

                        $r='';
                                if(!empty($records)){
                                      foreach ($records as $key => $val) {
                                       //sleep(1);
                                      $targetFilepath = $targetdir.$millisecondss.$val;
                                      $r .=$millisecondss.$val;
                                      move_uploaded_file($_FILES['records']['tmp_name'][$key], $targetFilepath);
                                      }
                                          $sql = "UPDATE `uccp_enrollee` SET records = '$r' WHERE name ='$fullname'";
                                          $result1 = mysqli_query($conn,$sql);
                                          echo '<script type="text/javascript">window.location="../studentportal.php";alert("Submit")</script>';
                                      }
            }else{
                 echo '<script>alert("Enrollment is not yet Ready")</script>';
                 echo '<script type="text/javascript"> window.location="../studentportal.php";</script>';
                    return;
                
            }    }else{
               
                  echo '<script>alert("Enrollment is Closed")</script>';
                  echo '<script type="text/javascript"> window.location="../studentportal.php";</script>';
            }
                          }
 ?>
