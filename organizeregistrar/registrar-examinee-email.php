<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

include ("include/config.php");

if(isset($_POST['email1'])){
  $id = $_POST['email1'];

  require __DIR__.'../../includes/PHPMailer.php';
  require __DIR__.'../../includes/SMTP.php';
  require __DIR__.'../../includes/Exception.php';


  $sql= "SELECT * FROM `uccp_examinees`";
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
  $mail->Subject = "Schedule for Exams are Here!";
  //Set sender email
  $mail->setFrom('uccp@ucc-csd-bscs.com');   //Sender Email who will send email
  //Enable HTML
  $mail->isHTML(true);
  //Email body
  while($row = mysqli_fetch_array($result)){

      $y = $row['Name'];
      // $date = new dateTime($row['schedule']);
      // $sched = $date -> format('Y-m-d');
      $date = date('F d, Y', strtotime($row['schedule']));
      $room = $row['room'];
      $category = $row['category'];
      $batch = $row['batch'];
      if($id == $row['id']){

        $mail->Body = "<h1>Get Ready $y, </h1></br>
        <p>For your exam schedule are finalized, please be guided accordingly.</p>
        </br><p>You're in Batch: ".$batch." and Category: ".$category." </p>
        </br><p>Your Exam date is: ".$date." </p>
        </br><p>Your Room is on: ".$room." </p>
        </br>
        </br>
        <p>For any questions, please ask on the Facebook page of our <a href='https://www.facebook.com/uccsscouncil?mibextid=ZbWKwL'>University of Caloocan City - Supreme Student Council.</a></p>";


        $x= $row['Email'];
        $mail->addAddress($x);  //Email of the person who will receive email
      }
  }
  //Finally send email
  $mail->send();

//   echo 'Message has been sent <br>';
//   $save_result = save_mail($mail);
//   if ($save_result) {
//     echo "Message saved!";
//   }

//   else {
//     echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
//   }

  //Closing smtp connection
  $mail->smtpClose();
  ////////
}


// function save_mail($mail) {
//   //You can change 'Sent Mail' to any other folder or tag
//   //Use imap_getmailboxes($imapStream, '/imap/ssl') to retrieve a list of available folders or tags
//   $path = "{mail.ucc-csd-bscs.com:993/imap/ssl}INBOX.Sent";
//   //Tell your server to open an IMAP connection using the same username and password as you used for SMTP
//   $imapStream = imap_open($path, $mail->Username, $mail->Password);
//   $result = imap_append($imapStream, $path, $mail->getSentMIMEMessage());
//   imap_close($imapStream);
//   return $result;
// }

?>
