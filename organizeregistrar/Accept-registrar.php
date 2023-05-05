<?php
ini_set('display_errors',1);

 include ("include/config.php");

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

if(isset($_POST['accept1'])){
    
    $id = $_POST['accept1'];
     
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
                                     </br><h2><strong>CONGRATULATIONS </strong> We are accepting your application PLEASE GO TO ACCOUNTING BUILDING </h2>";

                                      $x= $row['email'];
                                      $mails->addAddress($x);  //Email of the person who will receive email
                                    }

                                   }
                                   //Finally send email
                                    $mails->send();
                                    
                                        echo 'Message has been sent <br>';
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

                          $sqls = "INSERT INTO `uccp_admission_billing`(`id`,`Name`,`Gender`,`Birthday`, `Birthplace` ,`Number`,`Email`,`Address`,`Guardian`,`G-Occupation`,`G-Contact`,`G-Adress`, `Primary`,`Primary-Sy`,`Highschool`,`Highschool-Sy`,`Shs`,`Shs-Sy`,`Firstchoice`,`Requirements`,`Picture`,`Proof`,`Card`,`Schoolyear`,`type`, `price`, `ornumber`, `totalprice`,`status`) SELECT `id`,`name`,`gender`,`birthday`, `birthplace`, `number`,`email`,`address`,`guardian`,`g-Occupation`,`g-Contact`,`g-Adress`,`primary`,`primary-Sy`,
                            `highschool`,`highschool-Sy`,`shs`,`shs-Sy`,`firstchoice`,`requirements`,`picture`,`proof`, `card`,`schoolyear`,'','','','','' FROM `uccp_admission` WHERE id ='$id'";
                           
                            mysqli_query($conn,$sqls);
                            
                          $query1 = "DELETE FROM `uccp_admission` WHERE id = '$id'";
                          mysqli_query($conn,$query1);
                        }

                                    // function save_mail($mails){
                                    //         //You can change 'Sent Mail' to any other folder or tag
                                    //         //Use imap_getmailboxes($imapStream, '/imap/ssl') to retrieve a list of available folders or tags
                                    //         $path = "{mail.ucc-csd-bscs.com:993/imap/ssl}INBOX.Sent";
                                    //         //Tell your server to open an IMAP connection using the same username and password as you used for SMTP
                                    //         $imapStream = imap_open($path, $mails->Username, $mails->Password);
                                    //         $result = imap_append($imapStream, $path, $mails->getSentMIMEMessage());
                                    //         imap_close($imapStream);
                                    //         return $result;
                                    //     }

 ?>
