<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

include ("include/config.php");

if(isset($_POST['id'])){

  $v = $_POST['sy'];


 require __DIR__.'../../includes/PHPMailer.php';
 require __DIR__.'../../includes/SMTP.php';
 require __DIR__.'../../includes/Exception.php';

$sql= "SELECT * FROM `uccp_passers` WHERE `Schoolyear` = '$v';";
$result = mysqli_query($conn,$sql);



 while($row = mysqli_fetch_array($result)){
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
                                   $mail->Subject = "Congratulations PASSERS!";
                                 //Set sender email
                                   $mail->setFrom('uccp@ucc-csd-bscs.com');   //Sender Email who will send email
                                 //Enable HTML
                                   $mail->isHTML(true);
                                 //Email body

                                   $y=$row['Name'];
                                   $mail->Body = "<h1>YOU MADE IT !  $y </h1>
                                   </br><p>YOU ARE NOW ELIGABLE TO ENROLL IN OUR UNIVERSITY, PLEASE WAIT FOR THE ANNOUNCEMENT OF ENROLLMENT</p>";

                                     $x= $row['Email'];
                                     $mail->addAddress($x);  //Email of the person who will receive email


                                 //Finally send email
                                   $mail->send();

                                         echo 'Message has been sent <br>';
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
   }

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
