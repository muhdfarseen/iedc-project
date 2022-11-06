<?php

if(isset($_POST['submitbutton']))
{

    $firstname = $_POST['firstname'];
    $branch = $_POST['branch'];
    $semester = $_POST['semester'];
    $rollno = $_POST['rollno'];
    $datenow = $_POST['datenow'];

    $reasonbox = $_POST['reasonbox'];

    require('fpdf.php');

    $pdf = new FPDF();
    $pdf->AddPage();

    $pdf->AddFont('Poppins-Medium','','Poppins-Medium.php');
    $pdf->AddFont('Poppins-Bold','','Poppins-Bold.php');
    $pdf->AddFont('Exo-Bold','','Exo-Bold.php');

    $pdf->SetFont('Exo-Bold','',20);

    $pdf->Image('pdfhead.png',55,10,100);
    $pdf->Ln(20);

    $pdf->Cell(190,0,'',1,1,'C');
    $pdf->Ln(10);
    $pdf->SetTextColor(1,220,130);
    $pdf->Cell(190,0,'ABSENTEE REPORT FORM',0,1,'C');
    $pdf->Ln(12);

    $pdf->SetTextColor(0,0,0);
    $pdf->SetFont('Poppins-Bold','',12);
    $pdf->Cell(19,10,'Name :');
    $pdf->SetFont('Poppins-Medium','',12);
    $pdf->SetTextColor(100,100,100);
    $pdf->Cell(0,10,$firstname);
    $pdf->Ln(10);

    $pdf->SetTextColor(0,0,0);
    $pdf->SetFont('Poppins-Bold','',12);
    $pdf->Cell(20,10,'Roll no :');
    $pdf->SetTextColor(100,100,100);
    $pdf->SetFont('Poppins-Medium','',12);
    $pdf->Cell(20,10,$rollno);

    $pdf->SetTextColor(0,0,0);
    $pdf->SetFont('Poppins-Bold','',12);
    $pdf->Cell(20,10,'Branch :');
    $pdf->SetTextColor(100,100,100);
    $pdf->SetFont('Poppins-Medium','',12);
    $pdf->Cell(20,10,$branch);


    $pdf->SetTextColor(0,0,0);
    $pdf->SetFont('Poppins-Bold','',12);
    $pdf->Cell(25,10,'Semester :');
    $pdf->SetTextColor(100,100,100);
    $pdf->SetFont('Poppins-Medium','',12);
    $pdf->Cell(20,10,$semester);

    $pdf->Ln(10);

    $pdf->SetTextColor(0,0,0);
    $pdf->SetFont('Poppins-Bold','',12);
    $pdf->Cell(14,10,'Date :');
    $pdf->SetTextColor(100,100,100);
    $pdf->SetFont('Poppins-Medium','',12);
    $pdf->Cell(20,10,$datenow);

    $pdf->Ln(10);

    $pdf->SetTextColor(0,0,0);
    $pdf->SetFont('Poppins-Bold','',12);
    $pdf->Cell(47,10,'Hour/Hours missed :');
    $pdf->SetTextColor(100,100,100);
    $pdf->SetFont('Poppins-Medium','',12);

    if(!empty($_POST['lang']))
    {    
        foreach($_POST['lang'] as $value){
            $pdf->Cell(15,10,$value);
            
        }
    }

    $pdf->Ln(10);

    $pdf->SetTextColor(0,0,0);
    $pdf->SetFont('Poppins-Bold','',12);
    $pdf->Cell(50,10,'Reason for Absence :');
    $pdf->SetTextColor(100,100,100);
    $pdf->SetFont('Poppins-Medium','',12);
    $pdf->MultiCell(0,10,$reasonbox);
    $pdf->Ln(5);

    $pdf->Cell(190,0,'',1,1,'C');
    $pdf->Ln(5);

    $pdf->SetFont('Poppins-Medium','',10);
    $pdf->Cell(20,10,'Signature of Student : ');
    $pdf->Ln(12);


    $pdf->SetFont('Poppins-Medium','',10);
    $pdf->MultiCell(0,5,'I understand that 75% physical presence is mandatory to attend the examination. I also ensure that I will make up the sessions I missed in consultation with faculty. I shall keep the decorum and code of c it as a student of College of Engineering Thalassery one the day mentioned above.');
    $pdf->Ln(5);

    $pdf->Cell(190,0,'',1,1,'C');
    $pdf->Ln(10);
    $pdf->SetFont('Exo-Bold','',20);
    $pdf->SetTextColor(1,220,130);
    $pdf->Cell(190,0,'RECOMMENDATIONS',0,1,'C');
    $pdf->Ln(5);

    $pdf->SetTextColor(100,100,100);
    $pdf->Ln(7);
    $pdf->SetFont('Poppins-Medium','',10);
    $pdf->Cell(100,10,'Signature of Tutor : ');

    $pdf->SetFont('Poppins-Medium','',10);
    $pdf->Cell(60,10,'Signature of HOD : ');
    $pdf->Ln(15);

    $pdf->SetFont('Poppins-Medium','',10);
    $pdf->Cell(60,10,'Forwarding remarks from IEDC Nodal officer : ');
    $pdf->Ln(15);

    $pdf->SetFont('Poppins-Medium','',10);
    $pdf->Cell(60,10,'Signature of Principal : ');
    $pdf->Ln(15);
    $pdf->Cell(190,0,'',1,1,'C');
    $pdf->Ln(5);

    $pdf->MultiCell(0,5,'>Get signature prior to access facility / attending workshop or seminar
    >This form does not claim your attendance. Even though reporting absence is best practice. Tutor and the Head of Departments can take appropriate decision
    >Signature of Head of the Department and Signature of Principal is required if the facility access is required on holiday');

    $pdf->Output();

}

?>
