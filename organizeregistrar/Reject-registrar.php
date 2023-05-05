<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;
  include ("include/config.php");

if(isset($_POST['reject'])){
  $id = $_POST['reject'];


 
 
//   $sql= "SELECT * FROM `uccp_admission`";
//   $result = mysqli_query($conn,$sql);
  
   
//  require __DIR__.'../includes/PHPMailer.php';
//  require __DIR__.'../includes/SMTP.php';
//  require __DIR__.'../includes/Exception.php';


  
  
//              $mails = new \PHPMailer\PHPMailer\PHPMailer();
             
//                                   //Set mailer to use smtp
//                                      $mails->isSMTP();
//                                   //Define smtp host
//                                      $mails->Host = "mail.ucc-csd-bscs.com";
//                                   //Enable smtp authentication
//                                      $mails->SMTPAuth = true;
//                                   //Set smtp encryption type (ssl/tls)
//                                      $mails->SMTPSecure = "ssl";
//                                   //Port to connect smtp
//                                      $mails->Port = "465";
//                                   //Set gmail username
//                                      $mails->Username = "uccp@ucc-csd-bscs.com";  //"Your Gmail Email Address Here"
//                                   //Set gmail password
//                                      $mails->Password = "uccpmailer123";     //"Your Gmail Password Here"
//                                   //Email subject
//                                      $mails->Subject = "UNIVERSITY OF CALOOCAN CITY";
//                                   //Set sender email
//                                      $mails->setFrom('uccp@ucc-csd-bscs.com');   //Sender Email who will send email
//                                   //Enable HTML
//                                      $mails->isHTML(true);
//                                   //Email body
//                                   while($row = mysqli_fetch_array($result)){
//                                      $y=$row['name'];

//                                      if($id == $row['id']){  //dinagdag ko 11-26-22 while working on remove enrollee
//                                      $mails->Body = "<h1>Hello, $y </h1>
//                                      </br><h2><strong>Were sorry </strong> for not accepting your application due to Some Reasons</h2>";

//                                       $x= $row['email'];
//                                       $mails->addAddress($x);  //Email of the person who will receive email
//                                     }

//                                   }
//                                   //Finally send email
//                                  $mails->send();

//                                         echo 'Message has been sent <br>';
                                        

//                                   //Closing smtp connection
//                                      $mails->smtpClose();
                          


 $sql= "SELECT * FROM `uccp_admission`";
    $result = mysqli_query($conn,$sql);

     require __DIR__.'../../includes/PHPMailer.php';
     require __DIR__.'../../includes/SMTP.php';
     require __DIR__.'../../includes/Exception.php';
 
    //Create instance of PHPMailer
                                  $mails = new \PHPMailer\PHPMailer\PHPMailer();
                                   //Set mailer to use smtp
                                     $mails->isSMTP();
                                   //Define smtp host
                                     $mails->Host = "mail.ucc-csd-bscs.com";
                                   //Enable smtp authentication
                                     $mails->SMTPAuth = true;
                                   //Set smtp encryption type (ssl/tls)
                                     $mails->SMTPSecure = "ssl";
                                   //Port to connect smtp
                                     $mails->Port = "465";
                                   //Set gmail username
                                     $mails->Username = "uccp@ucc-csd-bscs.com";  //"Your Gmail Email Address Here"
                                   //Set gmail password
                                     $mails->Password = "uccpmailer123";     //"Your Gmail Password Here"
                                   //Email subject
                                     $mails->Subject = "UNIVERSITY OF CALOOCAN CITY";
                                   //Set sender email
                                     $mails->setFrom('uccp@ucc-csd-bscs.com');   //Sender Email who will send email
                                   //Enable HTML
                                     $mails->isHTML(true);
                                   //Email body
                                   while($row = mysqli_fetch_array($result)){
                                     $y=$row['name'];

                                     if($id == $row['id']){  //dinagdag ko 11-26-22 while working on remove enrollee
                                     $mails->Body = "<h1>Hello, $y </h1>
                                       </br><h2><strong>Were sorry </strong> for not accepting your application due to Some Reasons</h2>";

                                      $x= $row['email'];
                                      $mails->addAddress($x);  //Email of the person who will receive email
                                    }

                                   }
                                   //Finally send email
                                    $mails->send();
                                    
                                        // echo 'Message has been sent <br>';
                                        //  $save_result = save_mail($mails);
                                        //  if ($save_result) {
                                        //      echo "Message saved!";
                                        //  }
                                        
                                        //  else {
                                        //  echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
                                        // }

                                   //Closing smtp connection
                                     $mails->smtpClose();
                                 ////////

                        
                            
                          $query1 = "DELETE FROM `uccp_admission` WHERE id = '$id'";
                          mysqli_query($conn,$query1);
                    


}




 ?>
