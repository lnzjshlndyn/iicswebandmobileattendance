<?php
session_start();
require("fpdf/fpdf.php");

date_default_timezone_set('Asia/Manila');

$curdate = date("Y-m-d H:i:s");

class PDF extends FPDF
{
// Page header
function Header()
{
  

    // Logo
    $this->Image('images/ust.jpg',25,10,27);
    $this->Image('images/logo.jpg',158,10,21);
    // Arial bold 15
    $this->SetFont('Arial','B',12);
    // Move to the right
    $this->Ln(8);
    $this->Cell(80);
    // Title;
    $this->Cell(35,6,'UNIVERSITY OF SANTO TOMAS',0,1,'C');
    $this->SetFont('Arial','',10);
    $this->Cell(0,6,'INSTITUTE OF INFORMATION AND COMPUTING SCIENCES',0,1,'C');
    // Line break
    $this->Ln(15);
    $this->SetFont('Arial','B',12);
    $this->Cell(80);
    $this->Cell(35,10,'Faculty Attendance Report',0,0,'C');
    $this->SetFont('Arial','',10);
    $this->Cell(115,10,'Date: ' . date("F d, Y"),0,0,'C');
    $this->SetFont('Arial','B',10);
    $this->Ln(15);
    $this->Cell(25,10,'Date',1,0,'C'); 
    $this->Cell(65,10,'Name',1,0,'C');
    $this->Cell(45,10,'Subject',1,0,'C');
    $this->Cell(25,10,'Room',1,0,'C');
    $this->Cell(30,10,'Status',1,0,'C');
    $this->Ln(10);
}

// Page footer
function Footer()
{
    // Arial italic 8
    $this->SetFont('Arial','I',8);
    // Position at 1.5 cm from bottom
    $this->SetY(-10);
    // Page number
    $this->Cell(0,10,'Page '.$this->PageNo().'/{nb}',0,0,'C');

}
}
//connect to mysql
include('db_connect.php');

//query

 
// Instanciation of inherited class
$pdf = new PDF();
$pdf->AliasNbPages();
$pdf->AddPage();
$pdf->SetFont('Times','',10);

//while
$pdf->Cell(25,10,'insert variable',1,0,'C'); 
$pdf->Cell(65,10,'insert variable',1,0,'C');
$pdf->Cell(45,10,'insert variable',1,0,'C');
$pdf->Cell(25,10,'insert variable',1,0,'C');
$pdf->Cell(30,10,'insert variable',1,0,'C');
$pdf->Ln(10);

//end of while


$pdf->Output();
?>