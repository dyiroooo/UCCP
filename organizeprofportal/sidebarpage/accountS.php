<?php

include '../include/config.php';

session_start();

$pass= $_SESSION['password'];
$user_id=$_SESSION['id'];
echo $pass;
if(isset($_POST['sendP'])){

    $current = $_POST['CurrentP'];
    $New = $_POST['NewP'];
    $Confirm = $_POST['ConfirmP'];




if($current == $pass){
    
    if($New == $Confirm){

          $update = "UPDATE uccp_login SET Password = '$New' WHERE id = '$user_id'";
          $query_run = mysqli_query($conn, $update);
          
          $updates = "UPDATE uccp_professor SET Password = '$New' WHERE id = '$user_id'";
          $query_run = mysqli_query($conn, $updates);
        
        echo '<script type="text/javascript"> window.location="../professorui.php";</script>';
   
          

        } else{
          echo " <script> alert('Password Didnt Match'); </script>";
       
          

echo '<script type="text/javascript"> window.location="../professorui.php";</script>';
    }

}else{
    
    echo " <script> alert('Current Password Not Valid'); </script>";
echo '<script type="text/javascript"> window.location="../professorui.php";</script>';
}     

        


}

?>

