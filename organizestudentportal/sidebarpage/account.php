<?php

include '../include/config.php';

session_start();



$user_id=$_SESSION['id'];
$pass=$_SESSION['password'];

echo $user_id;
echo $pass;


if(isset($_POST['x'])){

    $current = $_POST['Current'];
    $New = $_POST['New'];
    $Confirm = $_POST['Confirm'];



if($current == $pass){
    
    if($New == $Confirm){

          $update = "UPDATE uccp_login SET Password = '$New' WHERE id = '$user_id'";
          $query_run = mysqli_query($conn, $update);
          
          $updates = "UPDATE uccp_studentinfo SET Password = '$New' WHERE id = '$user_id'";
          $query_run = mysqli_query($conn, $updates);
        
        echo '<script type="text/javascript"> window.location="../studentportal.php";</script>';
   
          

        } else{
          echo " <script> alert('Password Didnt Match'); </script>";
       
          

echo '<script type="text/javascript"> window.location="../studentportal.php";</script>';
    }

}else{
    
    echo " <script> alert('Current Password Not Valid'); </script>";
echo '<script type="text/javascript"> window.location="../studentportal.php";</script>';
}     

        


}
?>