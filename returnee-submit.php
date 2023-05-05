<?php
ini_set('display_errors',1);

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

include('config.php');

    if(isset($_POST['returnesend'])){

      $lastname = $_POST['Lastname'];
      $middlename = $_POST['Middlename'];
      $firstname = $_POST['Givenname'];
      $bday = $_POST['Birthday'];
      $bdplace = $_POST['Bdplace'];
      $phone = $_POST['Number'];
      $haddress = $_POST['Haddress'];
      $gender = $_POST['Gender'];
      $email = $_POST['Email'];
      $course = $_POST['F-choice'];
      $year = $_POST['Yearlevel'];
      $schoolyear = $_POST['Schoolyear'];
      $sem = $_POST['Sem'];

      $fullname = $firstname." ".$middlename." ".$lastname;

            //   $r = mysqli_query($conn, "SELECT * FROM uccp_passers WHERE name ='$fullname' AND email='$email' AND Schoolyear='$schoolyear'"); ///validation only passers in ect can submit enrollment form
            //     $num_rowss = mysqli_num_rows($r);

            //     if($num_rowss == 0){
            //       echo '<script>alert("YOU CANT ENROLL YOU ARE NOT PASSERS")</script>';
            //       echo '<script type="text/javascript"> window.location="freshmenenrollmentform.php";</script>';
            //         return;
            //     }
            
                $sqlsy = "SELECT schoolyear,sem FROM `uccp_eval` WHERE name ='$fullname' AND remarks ='FAILED' OR remarks ='DROP' ";
                $result1 = mysqli_query($conn,$sqlsy);
                        while($row = mysqli_fetch_array($result1)){
                            $sy= $row['schoolyear'];
                            $semss= $row['sem'];
                        }
                        
                        if($sy == $schoolyear){
                         echo '<script>alert("YOU CANT ENROLL IN THIS SCHOOLYEAR")</script>';
                           echo '<script type="text/javascript"> window.location="returneeenrollmentform.php";</script>';
                                return;
                            }
                
                        if($semss != $sem){
                                echo '<script>alert("YOU CANT ENROLL IN THIS SEM")</script>';
                                  echo '<script type="text/javascript"> window.location="returneeenrollmentform.php";</script>';
                                return;
                            }
                            
                     $sqlb = "SELECT year FROM `uccp_eval` WHERE name ='$fullname' AND remarks ='FAILED' OR remarks ='DROP' ";
                    $result11b = mysqli_query($conn,$sqlb);       
                        
                            while($x = mysqli_fetch_array($result11b)){
                                $years = $x['year'];
                            }
                            
                            if($year != $years ){
                                echo '<script>alert("Please Double Check your YEAR")</script>';
                                  echo '<script type="text/javascript"> window.location="returneeenrollmentform.php";</script>';
                                return;
                            }
                            
                $sqls = "SELECT sem FROM `uccp_eval` WHERE name ='$fullname' AND remarks ='FAILED' OR remarks ='DROP' ";
                $result11 = mysqli_query($conn,$sqls);
            
                $r = mysqli_query($conn, "SELECT * FROM uccp_eval WHERE name ='$fullname' AND remarks ='FAILED' OR remarks ='DROP' "); ///validation only passers in ect can submit enrollment form
                $num_rowss = mysqli_num_rows($r);

                if($num_rowss == 0){
                  echo '<script>alert("YOU CANT ENROLL YOU ARE NOT CATEGORIZE AS RETURNEE")</script>';
                  echo '<script type="text/javascript"> window.location="returneeenrollmentform.php";</script>';
                    return;
                }

                $result = mysqli_query($conn,"SELECT name,birthday,email FROM uccp_enrollee WHERE name='$fullname' AND birthday='$bday' AND email='$email'");
                $num_rows = mysqli_num_rows($result);

                if($num_rows > 0){ //validation in submission
                    echo '<script>alert("YOU Already SUBMIT Returneeform FORM")</script>';
                    echo '<script type="text/javascript"> window.location="returneeenrollmentform.php";</script>';
                    return;
                  }

//////////////////////////////
                  $targetdir= "images/";

                  $picture= $_FILES['Picture']['name'];
                  $psa= $_FILES['Psa']['name'];
                  $diploma= $_FILES['Diploma']['name'];
                  $goodmoral= $_FILES['Goodmoral']['name'];
                  $card= $_FILES['Reportcard']['name'];
                  $proof= $_FILES['Proof']['name'];
                  $erf= $_FILES['Erf']['name'];
                  $records= $_FILES['Records']['name'];

                  $p= implode(',',$picture);
                  $ps= implode(',',$psa);
                  $d= implode(',',$diploma);
                  $g= implode(',',$goodmoral);
                  $c= implode(',',$card);
                  $pr= implode(',',$proof);
                  $er= implode(',',$erf);
                  $rec= implode(',',$records);
                  
                  $targer_file= $targetdir.$p;
                  $targer_file_psa = $targetdir.$ps;
                  $targer_file_diploma = $targetdir.$d;
                  $targer_file_goodmoral = $targetdir.$g;
                  $targer_file_card = $targetdir.$c;
                  $targer_file_proof = $targetdir.$pr;
                  $targer_file_erf = $targetdir.$er;
                  $targer_file_rec = $targetdir.$rec;

                  $filetype=strtolower(strtolower(pathinfo($targer_file,PATHINFO_EXTENSION)));
                  $filetypePS=strtolower(strtolower(pathinfo($targer_file_psa,PATHINFO_EXTENSION)));
                  $filetypeD=strtolower(strtolower(pathinfo($targer_file_diploma,PATHINFO_EXTENSION)));
                  $filetypeG=strtolower(strtolower(pathinfo($targer_file_goodmoral,PATHINFO_EXTENSION)));
                  $filetypeC=strtolower(strtolower(pathinfo($targer_file_card,PATHINFO_EXTENSION)));
                  $filetypePR=strtolower(strtolower(pathinfo($targer_file_proof,PATHINFO_EXTENSION)));
                  $filetypeERF=strtolower(strtolower(pathinfo($targer_file_erf,PATHINFO_EXTENSION)));
                  $filetypeREC=strtolower(strtolower(pathinfo($targer_file_rec,PATHINFO_EXTENSION)));

                  $totalFileSize = array_sum($_FILES['Picture']['size']);
                  $totalFileSizePS = array_sum($_FILES['Psa']['size']);
                  $totalFileSizeD = array_sum($_FILES['Diploma']['size']);
                  $totalFileSizeG = array_sum($_FILES['Goodmoral']['size']);
                  $totalFileSizeC = array_sum($_FILES['Reportcard']['size']);
                  $totalFileSizePR = array_sum($_FILES['Proof']['size']);
                  $totalFileSizeERF = array_sum($_FILES['Erf']['size']);
                  $totalFileSizeREC = array_sum($_FILES['Records']['size']);

                  $milliseconds = floor(microtime(true) * 1000);
                  $millisecondss = floor(microtime(true) * 2000);
                  $millisecondsss = floor(microtime(true) * 3000);
                  $millisecondssss = floor(microtime(true) * 4000);
                  $millisecondsssss = floor(microtime(true) * 5000);
                  $millisecondssssss = floor(microtime(true) * 6000);
                  $millisecondsssssss = floor(microtime(true) * 7000);
                  $millisecondssssssss = floor(microtime(true) * 8000);

                  if($totalFileSize  || $totalFileSizePS || $totalFileSizeD || $totalFileSizeG ||$totalFileSizeC || $totalFileSizePR || $totalFileSizeERF || $totalFileSizeREC > 0){
                        if($totalFileSize > 5120000){
                          echo '<script type="text/javascript">window.location="returneeenrollmentform.php";alert("File size too big")</script>';
                          return;
                      }
                      if($totalFileSizePS > 5120000){
                        echo '<script type="text/javascript">window.location="returneeenrollmentform.php";alert("File size too big")</script>';
                        return;
                    }
                    if($totalFileSizeD > 5120000){
                      echo '<script type="text/javascript">window.location="returneeenrollmentform.php";alert("File size too big")</script>';
                      return;
                  }
                  if($totalFileSizeG > 5120000){
                    echo '<script type="text/javascript">window.location="returneeenrollmentform.php";alert("File size too big")</script>';
                    return;
                }
                if($totalFileSizeC > 5120000){
                  echo '<script type="text/javascript">window.location="returneeenrollmentform.php";alert("File size too big")</script>';
                  return;
              }
              if($totalFileSizePR > 5120000){
                echo '<script type="text/javascript">window.location="returneeenrollmentform.php";alert("File size too big")</script>';
                return;
            }
            if($totalFileSizeERF > 5120000){
                echo '<script type="text/javascript">window.location="returneeenrollmentform.php";alert("File size too big")</script>';
                return;
            }
            if($totalFileSizeREC > 5120000){
                echo '<script type="text/javascript">window.location="returneeenrollmentform.php";alert("File size too big")</script>';
                return;
            }
                    }

                    if($filetype != "jpg" && $filetype != "png" && $filetype != "jpeg" && $filetype != "gif" ) {
                        echo '<script type="text/javascript">window.location="returneeenrollmentform.php"; alert("Wrong Input")</script>';
                        return;
                      }

                    if( $filetypePS != "jpg" &&  $filetypePS != "png" &&  $filetypePS != "jpeg" &&  $filetypePS != "gif" ) {
                        echo '<script type="text/javascript">window.location="returneeenrollmentform.php"; alert("Wrong Input")</script>';
                        return;
                        }

                    if($filetypeD != "jpg" &&    $filetypeD != "png" &&    $filetypeD != "jpeg" &&    $filetypeD != "gif" ) {
                        echo '<script type="text/javascript">window.location="returneeenrollmentform.php"; alert("Wrong Input")</script>';
                        return;
                          }
                    if($filetypeG != "jpg" && $filetypeG != "png" && $filetypeG != "jpeg" &&  $filetypeG != "gif" ) {
                        echo '<script type="text/javascript">window.location="returneeenrollmentform.php"; alert("Wrong Input")</script>';
                        return;
                            }
                    if($filetypeC != "jpg" && $filetypeC != "png" && $filetypeC != "jpeg" &&  $filetypeC != "gif" ) {
                        echo '<script type="text/javascript">window.location="returneeenrollmentform.php"; alert("Wrong Input")</script>';
                        return;
                              }
                    if($filetypePR != "jpg" && $filetypePR != "png" && $filetypePR != "jpeg" &&  $filetypePR != "gif" ) {
                        echo '<script type="text/javascript">window.location="returneeenrollmentform.php"; alert("Wrong Input")</script>';
                        return;
                              }
                    if($filetypeERF != "jpg" && $filetypeERF != "png" && $filetypeERF != "jpeg" &&  $filetypeERF != "gif" ) {
                        echo '<script type="text/javascript">window.location="returneeenrollmentform.php"; alert("x")</script>';
                        return;
                              }    
                    if($filetypeREC != "jpg" && $filetypeREC != "png" && $filetypeREC != "jpeg" &&  $filetypeREC != "gif" ) {
                        echo '<script type="text/javascript">window.location="returneeenrollmentform.php"; alert("j")</script>';
                        return;
                              }          
///////////////////////////////////////////////

                      $s='';
                          if(!empty($picture)){
                                foreach ($picture as $key => $val) {
                                $targetFilepath = $targetdir.$milliseconds.$val;
                                $s.= $milliseconds.$val;
                                move_uploaded_file($_FILES['Picture']['tmp_name'][$key], $targetFilepath);
                                }

                                $sql = "INSERT INTO `uccp_enrollee` (`name`, `gender`, `birthday`, `birthplace`, `email`, `phone`, `address`, `course`, `year`,`section`,`schoolyear`,`sem`,`picture`,`diploma`,
                                  `goodmoral`,`psa`,`card`,`proof`,`erf`,`records`,`status`,`username`,`password`,`account_type`)VALUES ('$fullname','$gender','$bday', '$bdplace', '$email','$phone', '$haddress', '$course',
                                    '$year','','$schoolyear','$sem','$s','','','','','','','','','','','');";
                              $result = mysqli_query ($conn,$sql);


                                }

                        $p='';
                                if(!empty($psa)){
                                      foreach ($psa as $key => $val) {
                                       //sleep(1);
                                      $targetFilepath = $targetdir.$millisecondss.$val;
                                      $p .=$millisecondss.$val;
                                      move_uploaded_file($_FILES['Psa']['tmp_name'][$key], $targetFilepath);
                                      }
                                          $sql = mysqli_query($conn,"UPDATE `uccp_enrollee` SET psa = '$p' WHERE name ='$fullname'");
                                      }
                                     $d='';

                                      if(!empty($diploma)){
                                            foreach ($diploma as $key => $val) {
                                          //  sleep(1);
                                            $targetFilepath = $targetdir.$millisecondsss.$val;
                                            $d .=$millisecondsss.$val;
                                            move_uploaded_file($_FILES['Diploma']['tmp_name'][$key], $targetFilepath);
                                            }
                                                $sql = mysqli_query($conn,"UPDATE `uccp_enrollee`SET diploma = '$d' WHERE name ='$fullname'");
                                      }
                                }                                           
                                        $g='';
                                            if(!empty($goodmoral)){
                                                  foreach ($goodmoral as $key => $val) {
                                                //  sleep(1);
                                                  $targetFilepath = $targetdir.$millisecondssss.$val;
                                                  $g .=$millisecondssss.$val;
                                                  move_uploaded_file($_FILES['Goodmoral']['tmp_name'][$key], $targetFilepath);
                                                  }
                                                      $sql = mysqli_query($conn,"UPDATE `uccp_enrollee`SET goodmoral = '$g' WHERE name ='$fullname'");
                                                  }
                                                  
                                                 $c='';
                                                  if(!empty($card)){
                                                        foreach ($card as $key => $val) {
                                                      //  sleep(1);
                                                        $targetFilepath = $targetdir.$millisecondsssss.$val;
                                                        $c .=$millisecondsssss.$val;
                                                        move_uploaded_file($_FILES['Reportcard']['tmp_name'][$key], $targetFilepath);
                                                        }
                                                            $sql = mysqli_query($conn,"UPDATE `uccp_enrollee` SET card = '$c' WHERE name ='$fullname'");
                                                        }
                                                      $pr='';
                                                      
                                                        if(!empty($proof)){
                                                              foreach ($proof as $key => $val) {
                                                            //  sleep(1);
                                                              $targetFilepath = $targetdir.$millisecondssssss.$val;
                                                              $pr .=$millisecondssssss.$val;
                                                              move_uploaded_file($_FILES['Proof']['tmp_name'][$key], $targetFilepath);
                                                              }
                                                                  $sql = mysqli_query($conn,"UPDATE `uccp_enrollee` SET proof = '$pr' WHERE name ='$fullname'");
                                                               //nilipat ko sa accept enrollment accounting   //$sql = mysqli_query($conn,"UPDATE `uccp_eval` SET remarks = 'F' WHERE name ='$fullname' AND year ='$year' AND sem = '$sem'");
                                                                  
                                                                // echo '<script type="text/javascript">window.location="returneeenrollmentform.php";alert("Submit")</script>';
                                                              }
                                                        $erfs = '';      
                                                        if(!empty($erf)){
                                                              foreach ($erf as $key => $val) {
                                                            //  sleep(1);
                                                              $targetFilepath = $targetdir.$millisecondsssssss.$val;
                                                              $erfs .=$millisecondsssssss.$val;
                                                              move_uploaded_file($_FILES['Erf']['tmp_name'][$key], $targetFilepath);
                                                              }
                                                                  $sql = mysqli_query($conn,"UPDATE `uccp_enrollee` SET erf = '$erfs' WHERE name ='$fullname'");
                                                               //nilipat ko sa accept enrollment accounting   //$sql = mysqli_query($conn,"UPDATE `uccp_eval` SET remarks = 'F' WHERE name ='$fullname' AND year ='$year' AND sem = '$sem'");
                                                                  
                                                                // echo '<script type="text/javascript">window.location="returneeenrollmentform.php";alert("Submit")</script>';
                                                              }
                                                        $recs = '';      
                                                        if(!empty($records)){
                                                              foreach ($records as $key => $val) {
                                                            //  sleep(1);
                                                              $targetFilepath = $targetdir.$millisecondssssssss.$val;
                                                              $recs .=$millisecondssssssss.$val;
                                                              move_uploaded_file($_FILES['Records']['tmp_name'][$key], $targetFilepath);
                                                              }
                                                                  $sql = mysqli_query($conn,"UPDATE `uccp_enrollee` SET records = '$recs' WHERE name ='$fullname'");
                                                               //nilipat ko sa accept enrollment accounting   //$sql = mysqli_query($conn,"UPDATE `uccp_eval` SET remarks = 'F' WHERE name ='$fullname' AND year ='$year' AND sem = '$sem'");
                                                                  
                                                                 
                                                                echo '<script type="text/javascript">window.location="returneeenrollmentform.php";alert("Submit")</script>';
                                                              }      
                                                            //////////////////////////////
                                                            
                                                             require __DIR__.'/includes/PHPMailer.php';
                                                             require __DIR__.'/includes/SMTP.php';
                                                             require __DIR__.'/includes/Exception.php';
                                                             
                                                            //Define name spaces
                                                            
                                                            require('fpdf/fpdf.php');
                                                            
                                                            class PDF extends FPDF
                                                            {
                                                                function Header()
                                                                {
                                                                    // Select Arial bold 15
                                                                    global $schoolyear;
                                                                    $this -> SetFont('Arial','',9);
                                                                    $this -> Cell(22,5,"$schoolyear",'0','1','L');
                                                                    $this -> Image('UCCLOGO.png',95,5,20,20);
                                                                    // Move to the right
                                                                    $this->Ln(18);
                                                                    // Framed title
                                                                    $this->SetFont('Times', 'B', 20);
                                                                    $this->Cell(0, 5, 'UNIVERSITY OF CALOOCAN CITY', 0, 1, 'C');
                                                            
                                                                    $this->SetFont('Times', '', 13);
                                                                    $this->Cell(0, 10, 'Biglang Awa St Cor 11th Ave Catleya,Caloocan, 1400 Metro Manila, Philippines', 0, 1, 'C');
                                                                    $this->Cell(0, 4, 'Email: admin@ucc-caloocan.edu.ph', 0, 1, 'C');
                                                                    $this->Ln(5);
                                                                }
                                                            
                                                                function Footer (){
                                                                  $this -> SetY(-10);
                                                                  $this->SetFont('Times', '', 12);
                                                                  $this->Cell(0, 10, 'Copyright © 2022 UCC | University of Caloocan City Website PORTAL | All Rights Reserved', 'T', 1, 'C');
                                                            
                                                            
                                                                }
                                                            }
                                                            
                                                            $pdf = new PDF();
                                                            $pdf -> Addpage();
                                                            $pdf -> SetFont('Arial','','26');
                                                            $pdf -> Cell(0,10,"ENROLLMENT FORM",'T,B','1','C');
                                                            
                                                            $pdf -> ln(10);
                                                            $pdf -> SetFont('Arial','B','15');
                                                            $pdf -> Cell(0,10,"PERSONAL DETAILS",'1','1','C');
                                                            //fullname
                                                            $pdf -> SetFont('Arial','B','12');
                                                            $pdf -> Cell(40,10,"FULLNAME :",'B,R,L,T','0','C');
                                                            $pdf -> Cell(0,10,"$fullname",'B,R,L,T','1','C');
                                                            //gender
                                                            $pdf -> Cell(40,10,"GENDER :",'1','0','C');
                                                            $pdf -> Cell(0,10,"$gender",'B,R,T','1','C');
                                                             //bday
                                                             $pdf -> Cell(40,10,"DATE OF BIRTH:",'B,R,L,T','0','C');
                                                            $pdf -> Cell(60,10,"$bday",'B,R,T','0','C');
                                                           //bdplace
                                                             $pdf -> Cell(45,10,"PLACE OF BIRTH :",'B,R,L,T','0','C');
                                                             $pdf -> Cell(45,10,"$bdplace",'B,R,T','1','C');
                                                            
                                                            //contact
                                                            $pdf -> Cell(40,10,"CONTACT NO. :",'1','0','C');
                                                            $pdf -> Cell(0,10,"$phone",'B,L,R,T','1','C');
                                                            //email
                                                            $pdf -> Cell(40,10,"EMAIL :",'1','0','C');
                                                            $pdf -> Cell(0,10,"$email",'B,R,T','1','C');
                                                            
                                                             //homeaddress
                                                            $pdf -> Cell(40,10,"ADDRESS :",'1','0','C');
                                                            $pdf -> Cell(0,10,"$haddress",'B,R,T','1','C');
                                                            
                                                            //desired courses
                                                            $pdf -> ln(5);
                                                            $pdf -> SetFont('Arial','B','15');
                                                            $pdf -> Cell(0,10,"COURSE",'1','1','C');
                                                            
                                                            //first choice
                                                            $pdf -> SetFont('Arial','B','11');
                                                            $pdf -> Cell(80,10," COURSE :",'1','0','C');
                                                            $pdf -> Cell(0,10,"$course",'B,R,T','1','C');
                                                            
                                                            //desired courses
                                                            
                                                            $pdf -> SetFont('Arial','B','11');
                                                            $pdf -> Cell(80,10,"Year Level",'1','0','C');
                                                            
                                                            //first choice
                                                            $pdf -> SetFont('Arial','B','11');
                                                            $pdf -> Cell(0,10,"$year",'1','1','C');
                                                            
                                                            
                                                            $pdf -> SetFont('Arial','B','11');
                                                            $pdf -> Cell(80,10,"SEMESTER",'1','0','C');
                                                            
                                                            //first choice
                                                            $pdf -> SetFont('Arial','B','11');
                                                            $pdf -> Cell(0,10,"$sem",'1','1','C');
                                                            
                                                            
                                                            
                                                            //signature part
                                                            $pdf -> ln(25);
                                                            $pdf -> Cell(110,10,"",'0','0','R');
                                                            $pdf -> Cell(0,10,"Signature Over Printed Name",'T','0','C');
                                                            
                                                            $file = time().'.pdf';
                                                            $x = $pdf-> output($file,'S');
                                                            
                                                            //Create instance of PHPMailer
                                                              $mail = new PHPMailer();
                                                            //Set mailer to use smtp
                                                              $mail->isSMTP();
                                                            //Define smtp host
                                                              $mail->Host = 'mail.ucc-csd-bscs.com';
                                                            //Enable smtp authentication
                                                              $mail->SMTPAuth = true;
                                                            //Set smtp encryption type (ssl/tls)
                                                             $mail->SMTPSecure = "ssl";
                                                            //Port to connect smtp
                                                              $mail->Port = "465";
                                                            //Set gmail username
                                                             $mail->Username = 'uccp@ucc-csd-bscs.com'; 
                                                            //Set gmail password
                                                             $mail->Password = 'uccpmailer123';
                                                            
                                                            //Email subject
                                                              $mail->Subject = "ENROLLMENT FORM COPY";
                                                            //Set sender email
                                                            $mail->setFrom('uccp@ucc-csd-bscs.com'); 
                                                            //Enable HTML
                                                              $mail->isHTML(true);
                                                            //Email body
                                                              $mail->Body = "<h1>GOOD DAY ! $fullname</h1>
                                                              </br><p>Below is the copy of your Enrollment Form</p>";
                                                                 $mail->AddStringAttachment($x, 'EnrollmentForm.pdf', 'base64', 'application/pdf');
                                                            //Add recipient
                                                              $mail->addAddress("$email");  //Email of the person who will receive email
                                                            //Finally send email
                                                            
                                                             $mail->send();
                                                            
                                                             echo 'Message has been sent <br>';
                                                                           $save_result = save_mail($mail);
                                                                             if ($save_result) {
                                                                             echo "Message saved!";
                                                                             }
                                                                             else {
                                                                             echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
                                                                                  }

                                                            //Closing smtp connection
                                                              $mail->smtpClose();
                                                            ////////
                                                        function save_mail($mail) {
                                                            //You can change 'Sent Mail' to any other folder or tag
                                                            //Use imap_getmailboxes($imapStream, '/imap/ssl') to retrieve a list of available folders or tags
                                                            $path = "{mail.ucc-csd-bscs.com:993/imap/ssl}INBOX.Sent";
                                                            //Tell your server to open an IMAP connection using the same username and password as you used for SMTP
                                                            $imapStream = imap_open($path, $mail->Username, $mail->Password);
                                                            $result = imap_append($imapStream, $path, $mail->getSentMIMEMessage());
                                                            imap_close($imapStream);
                                                            return $result;
                                                        }
                                        ?>
