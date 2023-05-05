<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

  include ("include/config.php");

if(isset($_POST['accept1'])){
  $id = $_POST['accept1'];




 $r = mysqli_query($conn, "SELECT * FROM uccp_enrolled WHERE id = '$id'"); 
 $num_rowss = mysqli_num_rows($r);
    
     if($num_rowss > 0){
         
                $query =  "INSERT INTO `uccp_enrollment_billing`(`id`,`name`, `gender`, `birthday`, `birthplace`, `email`, `phone`, `address`, `course`, `year`, `schoolyear`, `sem`, `picture`, `diploma`, 
    `goodmoral`, `psa`, `card`, `proof`,`erf`,`records`,`ornumber`, `status`, `feetype`, `price`, `totalprice`, `balance`, `payable_fee`, `username`, `password`, `account_type`) 
    
    	SELECT  `id`,`name`, `gender`, `birthday`, `birthplace`, `email`, `phone`, `address`, `course`, `year`, `schoolyear`, `sem`, `picture`, `diploma`, `goodmoral`,
     `psa`, `card`, `proof`,`erf`,`records`,'',`status` ,'', '', '', '', '',`username`, `password`, `account_type` FROM `uccp_enrollee`WHERE id='$id'; ";
      mysqli_query($conn,$query);
      
        $queryss = "UPDATE `uccp_studentinfo` SET status ='Not-Enrolled', section = '',sem = ''   WHERE id = '$id';";
      mysqli_query($conn,$queryss);
        
     //default neto naka comment
      $sql = "DELETE FROM `uccp_enrollee` WHERE id= $id";
      $result= mysqli_query($conn,$sql);

    }else{

 require __DIR__.'../../includes/PHPMailer.php';
 require __DIR__.'../../includes/SMTP.php';
 require __DIR__.'../../includes/Exception.php';
 
   
 
 
 
$sql= "SELECT * FROM `uccp_enrollee`";
$result = mysqli_query($conn,$sql);


$mail = new PHPMailer();
                                 //Set mailer to use smtp
                                   $mail->isSMTP();
                                 //Define smtp host
                                   $mail->Host = "mail.ucc-csd-bscs.com";
                                 //Enable smtp authentication
                                   $mail->SMTPAuth = true;
                                 //Set smtp encryption type (ssl/tls)
                                   $mail->SMTPSecure = "ssl";
                                 //Port to connect smtp
                                   $mail->Port = "465";
                                 //Set gmail username
                                   $mail->Username = "uccp@ucc-csd-bscs.com";  //"Your Gmail Email Address Here"
                                 //Set gmail password
                                   $mail->Password = "uccpmailer123";     //"Your Gmail Password Here"
                                 //Email subject
                                   $mail->Subject = "Congratulations";
                                 //Set sender email
                                   $mail->setFrom('uccp@ucc-csd-bscs.com');   //Sender Email who will send email
                                 //Enable HTML
                                   $mail->isHTML(true);
                                 //Email body
                                 while($row = mysqli_fetch_array($result)){
                                   $y=$row['name'];
                                      $x= $row['email'];
                                    $b=  str_replace(' ', '', $y);
                                    if($id == $row['id']){

                                      $sql1 = mysqli_query($conn,"UPDATE `uccp_enrollee` SET username = '$x',password ='$b', account_type = 1 WHERE id ='$id'");

                                   $mail->Body = "<h1>GOOD DAY ! $y </h1><p><strong>Congratulations We accept your Enrollment Form but <br>YOU ARE NOT OFFICALLY ENROLLED YET! </strong></p>
                                   </br><p><strong>YOUR ACCOUNT:</strong></p> <br><p><strong>Username:</strong></p> <p>$x</p>
                                   <br><p><strong>Password:</strong></p> <p>$b</p>

                                    <br><p><strong>PLEASE PROCEED TO ACCOUNTING BUILDING INSIDE CAMPUS TO REQUEST ENROLLMENT BILLING</strong></p> ";

                                     $mail->addAddress($x);  //Email of the person who will receive email
                                   }
                                 }
                                 //Finally send email
                                   $mail->send();

                                        // echo 'Message has been sent <br>';
                                        //  $save_result = save_mail($mail);
                                        //  if ($save_result) {
                                        //      echo "Message saved!";
                                        //  }
                                        
                                        //  else {
                                        //  echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
                                        // }
                                          
                                 //Closing smtp connection
                                   $mail->smtpClose();
                               ////////


    // $q = "INSERT INTO `uccp_login`(`id`, `Username`,`Password`,`Usertype`) SELECT  `id`, `username`, `password`, `account_type` FROM `uccp_enrollee` WHERE id='$id';";
    //  mysqli_query($conn,$q);
     
    $q = "INSERT INTO `uccp_login` (`id`, `Username`, `Email`, `Usertype`, `Password`, `otp`) SELECT `id`, `username`, `email`, `account_type`, `password`, '' FROM uccp_enrollee WHERE id='$id'";
     mysqli_query($conn,$q);
     
      $queryz = "INSERT INTO `uccp_studentinfo` (`id`, `name`, `gender`, `birthday`, `email`, `phone`,`address`,`course`, `year`, `section`, `schoolyear`, `sem`, `picture`, `diploma`, `goodmoral`, `psa`, `card`, `proof`,`erf`,`records`, `status`, `username`, `password`, `account_type`) SELECT `id`, `name`, `gender`, `birthday`, `email`, `phone`,`address`, `course`, `year`,`section`, `schoolyear`, `sem`, `picture`, `diploma`, `goodmoral`, `psa`, `card`, `proof`,`erf`,`records`, `status`, `username`, `password`, `account_type` FROM `uccp_enrollee` WHERE id = '$id';";
        mysqli_query($conn,$queryz);

//   $query = "INSERT INTO `uccp_enrollment_billing` (`id`, `name`, `gender`, `birthday`, `email`, `phone`, `course`, `year`, `schoolyear`, `sem`, `picture`,
//   `diploma`, `goodmoral`, `psa`, `card`, `proof`, `status`, `username`, `password`, `account_type`) SELECT `id`, `name`, `gender`,
//   `birthday`, `email`, `phone`, `course`, `year`, `schoolyear`, `sem`, `picture`, `diploma`, `goodmoral`, `psa`, `card`, `proof`, `status`, `username`, `password`, `account_type` FROM `uccp_enrollee`
//   WHERE id = '$id';";
//      mysqli_query($conn,$query);

     
       $query =  "INSERT INTO `uccp_enrollment_billing`(`id`,`name`, `gender`, `birthday`, `birthplace`, `email`, `phone`, `address`, `course`, `year`, `schoolyear`, `sem`, `picture`, `diploma`, 
    `goodmoral`, `psa`, `card`, `proof`,`erf`,`records`,`ornumber`, `status`, `feetype`, `price`, `totalprice`, `balance`, `payable_fee`, `username`, `password`, `account_type`) 
    
    	SELECT  `id`,`name`, `gender`, `birthday`, `birthplace`, `email`, `phone`, `address`, `course`, `year`, `schoolyear`, `sem`, `picture`, `diploma`, `goodmoral`,
     `psa`, `card`, `proof`,`erf`,`records`,'',`status` ,'', '', '', '', '',`username`, `password`, `account_type` FROM `uccp_enrollee`WHERE id='$id';";
       mysqli_query($conn,$query);
     
     
      $queryx = "UPDATE `uccp_studentinfo` SET status = 'Unpaid'  WHERE id = '$id';";
      mysqli_query($conn,$queryx);

  //
      $sql = "DELETE FROM `uccp_enrollee` WHERE id= $id";
      $result= mysqli_query($conn,$sql);
      //
} //sa if else to sa taas
}

// function save_mail($mail) {
//                                             //You can change 'Sent Mail' to any other folder or tag
//                                             //Use imap_getmailboxes($imapStream, '/imap/ssl') to retrieve a list of available folders or tags
//                                             $path = "{mail.ucc-csd-bscs.com:993/imap/ssl}INBOX.Sent";
//                                             //Tell your server to open an IMAP connection using the same username and password as you used for SMTP
//                                             $imapStream = imap_open($path, $mail->Username, $mail->Password);
//                                             $result = imap_append($imapStream, $path, $mail->getSentMIMEMessage());
//                                             imap_close($imapStream);
//                                             return $result;
//                                         }

 ?>
