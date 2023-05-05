<?php
include 'dbcon.php';

$editstudent_id = mysqli_real_escape_string($con, $_POST['stdid']);
$name = mysqli_real_escape_string($con, $_POST['stdname']);
$gender = mysqli_real_escape_string($con, $_POST['stdgender']);
$date = mysqli_real_escape_string($con, $_POST['stdbirthday']);
$email = mysqli_real_escape_string($con, $_POST['stdemail']);
$phone = mysqli_real_escape_string($con, $_POST['stdphone']);
$address = mysqli_real_escape_string($con, $_POST['stdaddress']);

$username = mysqli_real_escape_string($con, $_POST['stdusername']);
$pass = mysqli_real_escape_string($con, $_POST['stdpassword']);

if ($date == "") {
  //$query1 = "UPDATE uccp_enrolled SET name='".$name."', gender='".$gender."', email='".$email."', phone='".$phone."', username='".$username."', password='".$pass."' WHERE id = '".$editstudent_id."' ";
  $query2 = "UPDATE uccp_studentinfo SET name='".$name."', gender='".$gender."', email='".$email."', phone='".$phone."', address='".$address."', username='".$username."', password='".password_hash($pass, PASSWORD_BCRYPT)."' WHERE id = '".$editstudent_id."' ";
  
  if ($query_run = mysqli_query($con, $query2)) {
    //echo "success";
  }else {
    die($con -> error);
  }
}

$query = "UPDATE uccp_studentinfo SET name='".$name."', gender='".$gender."', birthday='".$date."', email='".$email."', phone='".$phone."' , address='".$address."' , username='".$username."', password='".$pass."' WHERE id = '".$editstudent_id."' ";
// $query = "UPDATE uccp_enrolled SET name='".$name."', gender='".$gender."', birthday='".$date."', email='".$email."', phone='".$phone."', username='".$username."', password='".password_hash($pass, PASSWORD_BCRYPT)."' WHERE id = '".$editstudent_id."' ";
$query_run = mysqli_query($con, $query);

$query1 = "UPDATE uccp_login SET Password='".$pass."' WHERE id = '".$editstudent_id."'";
$query_run1 = mysqli_query($con, $query1);

 ?>
