<?php

ini_set('display_errors',1);


use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

include('config.php');

    if(isset($_POST['send'])){

          $Lastname = $_POST['Lastname'];
          $Givenname = $_POST['Givenname'];
          $Middlename = $_POST['Middlename'];
          $Gender = $_POST['Gender'];
          $Birthday = $_POST['Date'];
          $Birthplace = $_POST['Bdplace'];
          $Number = $_POST['Number'];
          $Email = $_POST['Email'];
          $Address = $_POST['Address'];
          $Guardian = $_POST['Guardian'];
          $Goccupation  = $_POST['G-occupation'];
          $Gcontact =$_POST['G-contact'];
          $Gaddress = $_POST['G-address'];
          $Primary = $_POST['Primary'];
          $Primarysy = $_POST['Primary-sy'];
          $Highschool = $_POST['Highschool'];
          $Highschoolsy = $_POST['Highschool-sy'];
          $Shs = $_POST['Shs'];
          $Shssy = $_POST['Shs-sy'];
          $Fchoice = $_POST['F-choice'];

          $sy = $_POST['Schoolyear'];
          $fullname = $Givenname." ".$Middlename." ".$Lastname;


          $result = mysqli_query($conn,"SELECT Name,Birthday,Email FROM uccp_admission WHERE Name='$fullname' AND Birthday='$Birthday' AND Email='$Email'");
          $num_rows = mysqli_num_rows($result);

          if($num_rows > 0){ //validation in submission
              echo '<script>alert("YOU Already SUBMIT ADMISSION FORM")</script>';
              echo '<script type="text/javascript"> window.location="admissionform.php";</script>';
              return;
            }


    // include('fpdf_admission_form.php');///tentative

              $targetdir= "images/";

              $images= $_FILES['Requirements']['name'];
              $Card= $_FILES['Card']['name'];
              $Picture= $_FILES['Picture']['name'];
              $Proof= $_FILES['Proof']['name'];

              $t= implode(',',$images);
              $c= implode(',',$Card);
              $p= implode(',',$Picture);
              $r= implode(',',$Proof);

              $targer_file= $targetdir.$t;
              $targer_file_card = $targetdir.$c;
              $targer_file_picture = $targetdir.$p;
              $targer_file_proof = $targetdir.$r;

              $filetype=strtolower(strtolower(pathinfo($targer_file,PATHINFO_EXTENSION)));
              $filetypeC=strtolower(strtolower(pathinfo($targer_file_card,PATHINFO_EXTENSION)));
              $filetypeP=strtolower(strtolower(pathinfo($targer_file_picture,PATHINFO_EXTENSION)));
              $filetypeR=strtolower(strtolower(pathinfo($targer_file_proof,PATHINFO_EXTENSION)));

              $totalFileSize = array_sum($_FILES['Requirements']['size']);
              $totalFileSizeC = array_sum($_FILES['Card']['size']);
              $totalFileSizeP = array_sum($_FILES['Picture']['size']);
              $totalFileSizeR = array_sum($_FILES['Proof']['size']);

              $milliseconds = floor(microtime(true) * 1000);
              $millisecondss = floor(microtime(true) * 2000);
              $millisecondsss = floor(microtime(true) * 3000);
              $millisecondssss = floor(microtime(true) * 4000);

                if($totalFileSize  || $totalFiletypeC || $totalFiletypeP || $totalFiletypeR > 0){
                      if($totalFileSize > 5120000){
                        echo '<script type="text/javascript">window.location="admissionform.php";alert("File Size is too big")</script>';
                        return;
                    }
                    if($totalFiletypeC > 5120000){
                      echo '<script type="text/javascript">window.location="admissionform.php";alert("File Size is too big")</script>';
                      return;
                  }
                  if($totalFiletypeP > 5120000){
                    echo '<script type="text/javascript">window.location="admissionform.php";alert("File Size is too big")</script>';
                    return;
                }
                if($totalFiletypeR > 5120000){
                  echo '<script type="text/javascript">window.location="admissionform.php";alert("File Size is too big")</script>';
                  return;
              }
            }

                if($filetype != "jpg" && $filetype != "png" && $filetype != "jpeg" && $filetype != "gif" ) {
                    echo '<script type="text/javascript">window.location="admissionform.php"; alert("Wrong Input")</script>';
                    return;
                  }

                  if($filetypeC != "jpg" &&  $filetypeC != "png" &&  $filetypeC != "jpeg" &&  $filetypeC != "gif" ) {
                      echo '<script type="text/javascript">window.location="admissionform.php"; alert("Wrong Input")</script>';
                      return;
                    }

                    if($filetypeR != "jpg" &&    $filetypeR != "png" &&    $filetypeR != "jpeg" &&    $filetypeR!= "gif" ) {
                        echo '<script type="text/javascript">window.location="admissionform.php"; alert("Wrong Input")</script>';
                        return;
                      }
                      if($filetypeP != "jpg" && $filetypeP != "png" && $filetypeP != "jpeg" &&  $filetypeP!= "gif" ) {
                          echo '<script type="text/javascript">window.location="admissionform.php"; alert("Wrong Input")</script>';
                          return;
                        }



                if(!empty($images)){
                      foreach ($images as $key => $val) {
                      $targetFilepath = $targetdir.$milliseconds.$val;
                      $x .= $milliseconds.$val;
                      move_uploaded_file($_FILES['Requirements']['tmp_name'][$key], $targetFilepath);
                      }


                    if( $sqla =mysqli_query ($conn, "INSERT INTO uccp_admission ( `name`, `gender`, `birthday`, `birthplace`,  `number`, `email`, `address`, `guardian`, `g-Occupation`, `g-Contact`, `g-Adress`, `primary`, `primary-Sy`, `highschool`, `highschool-Sy`,
                        `shs`,`shs-Sy`, `firstchoice`,`requirements`,`schoolyear`) VALUES ('$fullname','$Gender','$Birthday', '$Birthplace' , '$Number','$Email','$Address','$Guardian','$Goccupation','$Gcontact','$Gaddress','$Primary','$Primarysy','$Highschool',
                        '$Highschoolsy','$Shs','$Shssy','$Fchoice','$x','$sy')")){
                            
                            echo "success";
                        }else{
                            
                            die($conn -> error);
                        }
                      }

                      if(!empty($Card)){
                            foreach ($Card as $key => $val) {
                             //sleep(1);
                            $targetFilepath = $targetdir.$millisecondss.$val;
                            $card .=$millisecondss.$val;
                            move_uploaded_file($_FILES['Card']['tmp_name'][$key], $targetFilepath);
                            }
                                $sql = mysqli_query($conn,"UPDATE `uccp_admission` SET card = '$card' WHERE name ='$fullname'");
                            }

                            if(!empty($Picture)){
                                  foreach ($Picture as $key => $val) {
                                //  sleep(1);
                                  $targetFilepath = $targetdir.$millisecondsss.$val;
                                  $picture .=$millisecondsss.$val;
                                  move_uploaded_file($_FILES['Picture']['tmp_name'][$key], $targetFilepath);
                                  }
                                      $sql = mysqli_query($conn,"UPDATE `uccp_admission` SET picture = '$picture' WHERE name ='$fullname'");
                                      //bracket closing ko nasa baba nakalimutan ko kung bakit

                                  if(!empty($Proof)){
                                        foreach ($Proof as $key => $val) {
                                      //  sleep(1);
                                        $targetFilepath = $targetdir.$millisecondssss.$val;
                                        $proof .=$millisecondssss.$val;
                                        move_uploaded_file($_FILES['Proof']['tmp_name'][$key], $targetFilepath);
                                        }
                                            $sql = mysqli_query($conn,"UPDATE `uccp_admission` SET proof = '$proof' WHERE name ='$fullname'");
                                            echo '<script type="text/javascript">window.location="admissionform.php";alert("Submit")</script>';
                                        }
                                        
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
                                                global $sy;
                                                $this -> SetFont('Arial','',9);
                                                $this -> Cell(22,5,"$sy",'0','1','L');
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
                                        $pdf -> Cell(0,10,"ADMISSION FORM",'T,B','1','C');

                                        $pdf -> ln(10);
                                        $pdf -> SetFont('Arial','B','15');
                                        $pdf -> Cell(0,10,"PERSONAL DETAILS",'1','1','C');
                                      //fullname
                                        $pdf -> SetFont('Arial','B','12');
                                        $pdf -> Cell(40,10,"FULLNAME :",'B,R,L,T','0','C');
                                        $pdf -> Cell(0,10,"$fullname",'B,R,L,T','1','C');
                                        //gender
                                          $pdf -> Cell(40,10,"GENDER :",'B,R,L,T','0','C');
                                          $pdf -> Cell(0,10,"$Gender",'B,R,L,T','1','C');
                                        //bday
                                        $pdf -> Cell(40,10,"DATE OF BIRTH:",'B,R,L,T','0','C');
                                        $pdf -> Cell(60,10,"$Birthday",'B,R,T','0','C');
                                        //telephone
                                        $pdf -> Cell(45,10,"PLACE OF BIRTH :",'B,R,L,T','0','C');
                                        $pdf -> Cell(45,10,"$Birthplace",'B,R,T','1','C');
                                        //email
                                        $pdf -> Cell(40,10,"CONTACT NO. :",'1','0','C');
                                        $pdf -> Cell(0,10,"$Number",'B,L,R,T','1','C');
                                        //email
                                        $pdf -> Cell(40,10,"EMAIL :",'1','0','C');
                                        $pdf -> Cell(0,10,"$Email",'B,R,T','1','C');
                                        //homeaddress
                                        $pdf -> Cell(40,10,"ADDRESS :",'1','0','C');
                                        $pdf -> Cell(0,10,"$Address",'B,R,T','1','C');

                                          //guardians name
                                         $pdf -> SetFont('Arial','B','11');
                                         $pdf -> Cell(40,10,"GUARDIANS NAME :",'B,R,L,T','0','C');
                                         $pdf -> SetFont('Arial','B','12');
                                         $pdf -> Cell(0,10,"$Guardian",'B,R,L,T','1','C');

                                         //guardians contact and occupation
                                         $pdf -> Cell(40,10,"OCCUPATIONS : ",'B,T,L,R','0','C');
                                         $pdf -> Cell(60,10,"$Goccupation",'B,R,T','0','C');
                                         $pdf -> Cell(40,10,"CONTACT NO:",'B,R,T,L','0','C');
                                         $pdf -> Cell(0,10,"$Gcontact",'B,R,T','1','C');
                                        // G address
                                         $pdf -> Cell(40,10,"ADDRESS :",'1','0','C');
                                        $pdf -> Cell(0,10,"$Gaddress",'B,R,T','1','C');
                                      $pdf -> ln(5);
                                      //Educational BG
                                      $pdf -> SetFont('Arial','B','15');
                                      $pdf -> Cell(0,10,"EDUCATIONAL BACKGROUND",'1','1','C');
                                      //primary
                                      $pdf -> SetFont('Arial','B','11');
                                      $pdf -> Cell(40,10,"PRIMARY SCHOOL:",'B,R,L,T','0','C');
                                      $pdf -> Cell(90,10,"$Primary",'B,R,L,T','0','C');
                                      $pdf -> Cell(15,10,"S.Y :",'B,R,L,T','0','C');
                                      $pdf -> Cell(0,10,"$Primarysy ",'B,R,L,T','1','C');

                                      //highschool
                                      $pdf -> SetFont('Arial','B','11');
                                      $pdf -> Cell(40,10,"HIGH SCHOOL:",'B,R,L,T','0','C');
                                      $pdf -> Cell(90,10,"$Highschool",'B,R,L,T','0','C');
                                      $pdf -> Cell(15,10,"S.Y :",'B,R,L,T','0','C');
                                      $pdf -> Cell(0,10,"$Highschoolsy ",'B,R,L,T','1','C');

                                      //shs
                                      $pdf -> SetFont('Arial','B','9');
                                      $pdf -> Cell(40,10,"SENIOR HIGH SCHOOL:",'B,R,L,T','0','C');
                                      $pdf -> SetFont('Arial','B','11');
                                      $pdf -> Cell(90,10,"$Shs",'B,R,L,T','0','C');
                                      $pdf -> Cell(15,10,"S.Y :",'B,R,L,T','0','C');
                                      $pdf -> Cell(0,10,"$Shssy",'B,R,L,T','1','C');

                                      //desired courses
                                      $pdf -> ln(5);
                                      $pdf -> SetFont('Arial','B','15');
                                      $pdf -> Cell(0,10,"DESIRED COURSE",'1','1','C');

                                      //first choice
                                      $pdf -> SetFont('Arial','B','11');
                                      $pdf -> Cell(80,10,"FIRST CHOICE COURSE :",'1','0','C');
                                      $pdf -> Cell(0,10,"$Fchoice",'B,R,T','1','C');


                                      //signature part
                                      $pdf -> ln(19);
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
                                        $mail->Username = 'uccp@ucc-csd-bscs.com';  //"Your Gmail Email Address Here"
                                      //Set gmail password
                                        $mail->Password = 'uccpmailer123';     //"Your Gmail Password Here"
                                      //Email subject
                                        $mail->Subject = "ADMISSION FORM COPY";
                                      //Set sender email
                                        $mail->setFrom('uccp@ucc-csd-bscs.com');   //Sender Email who will send email
                                      //Enable HTML
                                        $mail->isHTML(true);
                                      //Email body
                                        $mail->Body = "<h1>GOOD DAY ! $fullname</h1>
                                        </br><p>Below is the copy of your Admission Form</p>";
                                           $mail->AddStringAttachment($x, 'AdmissionForm.pdf', 'base64', 'application/pdf');
                                      //Add recipient
                                        $mail->addAddress("$Email");  //Email of the person who will receive email
                                      //Finally send email
                                    $mail->send();
                                    
                                         echo 'Message has been sent <br>';
                                         $save_result = save_mail($mail);
                                         if ($save_result) {
                                             echo "Message saved!";
                                         } else {
                                         echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
                                        }
                                          
                                        //Function to call which uses the PHP imap_*() functions to save messages
                                            
                                      //Closing smtp connection
                                      $mail->smtpClose();
                                      ////////
                                                }
                                        }

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
