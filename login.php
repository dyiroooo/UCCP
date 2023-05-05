<?php
session_start();
error_reporting(0);

include('config.php');

if(isset($_POST['login'])){

        $user= $_POST['username'];
        $pass= $_POST['password'];

         $sql = mysqli_query($conn,"select * from uccp_login where username = '$user' and password = '$pass'");

          $rows = mysqli_fetch_assoc($sql);

            $u=$rows['Usertype'];

            if($u == '1'){
                    $sql1= "SELECT * FROM `uccp_studentinfo` WHERE username = '$user' AND password = '$pass'";
                    $result1 = mysqli_query($conn,$sql1);
                    while($row = mysqli_fetch_assoc($result1)){
                        $_SESSION['id']=$row['id'];
                        $_SESSION['name'] = $row['name'];
                        $_SESSION['gender'] = $row['gender'];
                        $_SESSION['birthday'] = $row['birthday'];
                        $_SESSION['email'] = $row['email'];
                        $_SESSION['phone'] = $row['phone'];
                        $_SESSION['address'] = $row['address'];
                        $_SESSION['year'] = $row['year'];
                        $_SESSION['course'] = $row['course'];
                        $_SESSION['section'] = $row['section'];
                        $_SESSION['picture'] = $row['picture'];
                        $_SESSION['status'] = $row['status'];
                        $_SESSION['password'] = $row['password'];
                        $_SESSION['schoolyear'] = $row['schoolyear'];
                        $_SESSION['sem'] = $row['sem'];
                    }
                    
                    header('location:organizestudentportal\studentportal.php'); //student portal
            }

            elseif($u == '2'){
                
                 $sql1= "SELECT * FROM `uccp_professor` WHERE username = '$user' AND password = '$pass'";
                    $result1 = mysqli_query($conn,$sql1);
                    while($row = mysqli_fetch_assoc($result1)){
                        $_SESSION['id'] = $row['id'];
                        $_SESSION['fullname'] = $row['fullname'];
                        $_SESSION['address'] = $row['address'];
                        $_SESSION['email'] = $row['email'];
                        $_SESSION['gender'] = $row['gender'];
                        $_SESSION['contact'] = $row['contact'];
                        $_SESSION['faculty'] = $row['faculty'];
                         $_SESSION['password'] = $row['password'];
                        //dyan ka muna
                    }
                
                header('location:organizeprofportal\professorui.php'); //prof portal
            }

            else if($u == '3'){
                header('location:organizeregistrar\registrar.php'); //registrar dashboard
              }

            else if ($u =='4'){
                  header('location:organizeaccounting/accounting.php'); //accounting dashboard
              }

               else if($u == '5'){
                    header('location:organizedean/dean.php'); //dean dashboard
               }

            else if($u == '6'){
                  header('location:fixedduplicateadmin\admin.php'); //admin dashboard
              }

            else {
                session_start();
                  $messages ="Username or Password Do not Match";
                  $_SESSION['Messages'] = $messages;
                    header('location:loginform.php');
                }
}
 ?>
