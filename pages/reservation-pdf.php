<?php
require('c:\xampp\htdocs\MLMS-Capstone\fpdf\fpdf.php');
class PDF extends FPDF
{
function Header()
{
    // Logo
    $this->Image('c:\xampp\htdocs\MLMS-Capstone\fpdf\logopdf.png',10,6,30);
  	// Title
    $this->SetFont('Arial','B',32);
  	$this->Cell(30);
	$this->SetTextColor(60,179,113);
    $this->Cell(50,10,'Holy Gardens Memorial Park','C');
    // Line break
    $this->Ln(10);
    // Sub
    $this->SetFont('Arial','',14);
  	$this->Cell(30);
	$this->SetTextColor(0,0,0);
    $this->Cell(50,10,'Sumulong Highway, Antipolo City, Philippines','C');
     $this->Ln(5);
    // Sub
    $this->SetFont('Arial','',14);
  	$this->Cell(30);
	$this->SetTextColor(0,0,0);
    $this->Cell(50,10,'hgmp@memoriallot.com','C');
    $this->Ln(15);
    
}
function Footer()
{
    // Go to 1.5 cm from bottom
    $this->SetY(-15);
    // Select Arial italic 8
    $this->SetFont('Arial','I',8);
    // Print centered page number
    $this->Cell(0,10,'Page '.$this->PageNo(),0,0,'C');
}
}
$pdf=new PDF();
$pdf->AliasNbPages();
$pdf->AddPage();
$pdf->SetFont('Times','B',12);
$pdf->Cell(80);
$pdf->Cell(0,0,'Customer Copy','C');
$pdf->Cell(20);
$pdf->Ln(10);
$pdf->Cell(30,10,'Order Date: xxxxx');
$pdf->Ln(10);
$pdf->Cell(30,10,'Customer Details','U');
$pdf->Ln(10);
$pdf->Cell(185, 30,'', 1);
$pdf->Ln(5);
$pdf->Cell(30, 10,'Daniella Soriano', 0);
$pdf->Ln(5);
$pdf->Cell(30, 10,'09100591307', 0);
$pdf->Ln(5);
$pdf->Cell(30, 10,'Cavite', 0);
$pdf->Ln(10);
$pdf->Cell(30, 20,'Payment Type: xxxxx', 0);
$pdf->Ln(10);
$pdf->Cell(30, 20,'Total Amount Due(PHP): xxxxx', 0);
$pdf->Ln(5);
$pdf->Cell(30, 20,'Amount Paid: xxxxx', 0);
$pdf->Ln(5);
$pdf->Cell(30, 20,'Change: xxxxx', 0);
$pdf->Output();


?>