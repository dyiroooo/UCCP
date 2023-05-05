<?php
/////nagamit na so no need /// for backup nalang
    require('fpdf/fpdf.php');

    class PDF extends FPDF
    {
        function Header()
        {
            // Select Arial bold 15

            $this -> SetFont('Arial','',9);
            $this -> Cell(22,5,"$",'0','1','L');
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
    $pdf -> Cell(0,10,"PERSONAL",'B,R,L,T','1','C');
    //gender
    $pdf -> Cell(40,10,"GENDER :",'1','0','C');
    $pdf -> Cell(0,10,"PERSONAL",'B,R,T','1','C');
    //bday
    $pdf -> Cell(60,10,"DATE OF BIRTHDATE:",'1','0','C');
    $pdf -> Cell(0,10,"PERSONAL",'B,R,T','1','C');
    //telephone
    $pdf -> Cell(50,10,"Contact:",'1','0','C');
    $pdf -> Cell(0,10,"PERSONALr",'B,R,T','1','C');
    //email
    $pdf -> Cell(40,10,"EMAIL :",'1','0','C');
    $pdf -> Cell(0,10,"PERSONAL",'B,R,T','1','C');

    //desired courses
    $pdf -> ln(5);
    $pdf -> SetFont('Arial','B','15');
    $pdf -> Cell(0,10,"COURSE",'1','1','C');

    //first choice
    $pdf -> SetFont('Arial','B','11');
    $pdf -> Cell(80,10,"FIRST CHOICE COURSE :",'1','0','C');
    $pdf -> Cell(0,10,"PERSONAL",'B,R,T','1','C');

    //desired courses

    $pdf -> SetFont('Arial','B','11');
    $pdf -> Cell(80,10,"Year Level",'1','0','C');

    //first choice
    $pdf -> SetFont('Arial','B','11');
    $pdf -> Cell(0,10,"PERSONAL",'1','1','C');


    //signature part
    $pdf -> ln(25);
    $pdf -> Cell(110,10,"",'0','0','R');
    $pdf -> Cell(0,10,"Signature Over Printed Name",'T','0','C');


    $file = time().'.pdf';
    $x = $pdf-> output($file,'D');



 ?>
