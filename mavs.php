<?php
//Include required PHPMailer files
	require 'includes/PHPMailer.php';
	require 'includes/SMTP.php';
	require 'includes/Exception.php';
//Define name spaces
	use PHPMailer\PHPMailer\PHPMailer;
	use PHPMailer\PHPMailer\SMTP;
	use PHPMailer\PHPMailer\Exception;

	require('fpdf/fpdf.php');

	class PDF extends FPDF
	{
			function Header()
			{
					// Select Arial bold 15

					$this -> SetFont('Arial','','9');
					$this -> Cell(22,5,"SY-2022-2023",'0','1','L');
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
	$pdf -> Cell(0,10,"FULLNAME :",'B,R,L,T','1','C');
//gender
	$pdf -> Cell(30,10,"GENDER :",'B,L,T','0','C');
	$pdf -> Cell(20,10,"MALE",'B,R,T','0','L');
//bday
	$pdf -> Cell(50,10,"DATE OF BIRTHDATE:",'B,L,T','0','C');
	$pdf -> Cell(25,10,"12-12-12",'B,R,T','0','L');
//telephone
$pdf -> Cell(25,10,"Contact:",'B,L,T','0','C');
$pdf -> Cell(0,10,"12-12-12",'B,R,T','1','C');
//email
$pdf -> Cell(40,10,"EMAIL :",'1','0','C');
$pdf -> Cell(0,10,"@ANGELOCHARLES@GMAIL.COM",'B,R,T','1','C');
//homeaddress
$pdf -> Cell(40,10,"ADDRESS :",'1','0','C');
$pdf -> Cell(0,10,"12312312GMAIL.COM",'B,R,T','1','C');

//guardians name
$pdf -> SetFont('Arial','B','11');
$pdf -> Cell(40,10,"GUARDIANS NAME :",'B,R,L,T','0','C');
$pdf -> SetFont('Arial','B','12');
$pdf -> Cell(0,10,"FULLNAME :",'B,R,L,T','1','C');

//guardians contact and occupation
$pdf -> Cell(40,10,"OCCUPATIONS :",'B,T,L','0','C');
$pdf -> Cell(60,10,"OCCUPATIONSS",'B,R,T','0','L');
$pdf -> Cell(40,10,"CONTACT :",'B,T,L','0','C');
$pdf -> Cell(0,10,"OCCUPATIONSS",'B,R,T','1','L');
// G address
$pdf -> Cell(40,10,"ADDRESS :",'1','0','C');
$pdf -> Cell(0,10,"@ANGELOCHARLES@GMAIL.COM",'B,R,T','1','C');
	$pdf -> ln(5);
//Educational BG
$pdf -> SetFont('Arial','B','15');
$pdf -> Cell(0,10,"EDUCATIONAL BACKGROUND",'1','1','C');
//primary
$pdf -> SetFont('Arial','B','11');
$pdf -> Cell(40,10,"PRIMARY SCHOOL:",'B,R,L,T','0','C');
$pdf -> Cell(90,10,"GRACE PARK ELEMENTARY SCHOOL MAIN",'B,R,L,T','0','C');
$pdf -> Cell(15,10,"S.Y :",'B,R,L,T','0','C');
$pdf -> Cell(0,10,"2022-2023 ",'B,R,L,T','1','C');

//highschool
$pdf -> SetFont('Arial','B','11');
$pdf -> Cell(40,10,"HIGH SCHOOL:",'B,R,L,T','0','C');
$pdf -> Cell(90,10,"GRACE PARK ELEMENTARY SCHOOL MAIN",'B,R,L,T','0','C');
$pdf -> Cell(15,10,"S.Y :",'B,R,L,T','0','C');
$pdf -> Cell(0,10,"2022-2023 ",'B,R,L,T','1','C');

//shs
$pdf -> SetFont('Arial','B','9');
$pdf -> Cell(40,10,"SENIOR HIGH SCHOOL:",'B,R,L,T','0','C');
$pdf -> SetFont('Arial','B','11');
$pdf -> Cell(90,10,"GRACE PARK ELEMENTARY SCHOOL MAIN",'B,R,L,T','0','C');
$pdf -> Cell(15,10,"S.Y :",'B,R,L,T','0','C');
$pdf -> Cell(0,10,"2022-2023 ",'B,R,L,T','1','C');

//desired courses
$pdf -> ln(5);
$pdf -> SetFont('Arial','B','15');
$pdf -> Cell(0,10,"DESIRED COURSE",'1','1','C');

//first choice
$pdf -> SetFont('Arial','B','11');
$pdf -> Cell(80,10,"FIRST CHOICE COURSE :",'1','0','C');
$pdf -> Cell(0,10,"@ANGELOCHARLES@GMAIL.COM",'B,R,T','1','C');
//second Choice
$pdf -> Cell(80,10,"SECOND CHOICE :",'1','0','C');
$pdf -> Cell(0,10,"@ANGELOCHARLES@GMAIL.COM",'B,R,T','1','C');

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
	$mail->Host = "smtp.gmail.com";
//Enable smtp authentication
	$mail->SMTPAuth = true;
//Set smtp encryption type (ssl/tls)
	$mail->SMTPSecure = "tls";
//Port to connect smtp
	$mail->Port = "587";
//Set gmail username
	$mail->Username = "mailerucc@gmail.com";  //"Your Gmail Email Address Here"
//Set gmail password
	$mail->Password = "nmmrpvjlvfszxlhb";     //"Your Gmail Password Here"
//Email subject
	$mail->Subject = "Test email using PHPMailer";
//Set sender email
	$mail->setFrom('mailerucc@gmail.com');   //Sender Email who will send email
//Enable HTML
	$mail->isHTML(true);
//Email body
	$mail->Body = "<h1>This is HTML h1 Heading</h1></br><p>This is html paragraph</p>";
		 $mail->AddStringAttachment($x, 'filename.pdf', 'base64', 'application/pdf');
//Add recipient
	$mail->addAddress('mailerucc@gmail.com');  //Email of the person who will receive email
//Finally send email
	if ( $mail->send() ) {
		echo "Email Sent..!";
	}else{
		echo "Message could not be sent. Mailer Error: "[$mail->ErrorInfo];
	}

//Closing smtp connection
	$mail->smtpClose();

	?>
