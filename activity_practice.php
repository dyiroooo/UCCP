<?php
/////nagamit na so no need /// for backup nalang
    require('fpdf/fpdf.php');

    class PDF extends FPDF
    {
        function Header()
        {
            // Select Arial bold 15

            $this -> SetFont('Arial','','9');
            $this -> Cell(22,5,"SY-2022-2023",'0','1','L');
            $this -> Image('UCCLOGO.png',95,10,20,20);
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
          $this->Cell(0, 0, 'Copyright © 2022 UCC | University of Caloocan City Website PORTAL | All Rights Reserved', '', 1, 'C');
          $this-> Cell(0,12,'Page no '.$this -> PageNo(),0,0,'C');
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
$pdf -> Cell(0,10,"@ANGELOCHARLES@GMAIL.COM",'B,R,T','1','C');

//guardians name
$pdf -> SetFont('Arial','B','11');
$pdf -> Cell(40,10,"GUARDIANS NAME :",'B,R,L,T','0','C');
$pdf -> SetFont('Arial','B','12');
$pdf -> Cell(0,10,"FULLNAME :",'B,R,L,T','1','C');

$pdf -> addpage();

$pdf -> SetFont('Arial','','12');
$pdf -> cell (0,100,'EYOOOO','L,R','0','C');

$pdf-> output();
