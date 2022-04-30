<?php

session_start();

if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin']!=true)
{
  header('Location: Log_in.php');
  exit;
}   
require 'pdf/fpdf.php';

class myPDF extends FPDF{
    function Start(){
        $this->Image('img/Logo.png', 10, 6,20);
        $this->SetFont('Arial', 'B', 26);
        $this->Cell(210, 6, 'Somnath Saree',0,0, 'C');
        $this->Ln();
        $this->SetFont('Times', '', 12);
        $this->Cell(210, 11, 'Anand Park, S.B.S. Road, Manavadar - 362630',0,0, 'C');
        $this->Ln(18);

    }
    function footer(){
        $this->SetY(-15);
        $this->SetFont('Arial', '', 8);
        $this->Cell(0, 10, 'Page ' .$this->PageNo(). '/{nb}',0,0,'C');
    }
    function CustomerName(){

        // Customer Name 
        include 'conponments/_dbconnect.php';
        
        $m_name = $_GET['c_name'];

        $this->SetFont('Arial','B',12);
        $this->Cell(37,10, 'Merchant Name : ', 0,0, 'L'); 
        $this->SetFont('Arial','',12);
        $this->Cell(47.5,10, $m_name, 0,0, 'L'); 
        $this->Ln(12);
   

                    // All Records
                    $sql = "SELECT * FROM `merchant` WHERE `merchant_name` = '$m_name' ";
                    $result = mysqli_query($conn, $sql);

                    // Table Heade
                    $this->SetFont('Arial','B',15);
                    $this->Cell(34,10, 'Date', 1,0, 'C');
                    $this->Cell(58,10, 'Saree Name', 1,0, 'C');
                    $this->Cell(34,10, 'Total Saree', 1,0, 'C');
                    $this->Cell(32,10, 'Price', 1,0, 'C');
                    $this->Cell(32,10, 'Total', 1,0, 'C');
                    $this->Ln();

                    // Data Table
                    $sum = 0;
                    while ($row = mysqli_fetch_array($result)){

                        $maltipal =($row['total_saree'])*($row['saree_price']);
                        $sum += $maltipal;
                        
                        $this->SetFont('Arial','',12);
                        $this->Cell(34,7, date("d-m-y", strtotime($row['date'])), 1,0, 'C');
                        $this->Cell(58,7, $row['saree_name'], 1,0, 'L');
                        $this->Cell(34,7, $row['total_saree'], 1,0, 'C');
                        $this->Cell(32,7, $row['saree_price'], 1,0, 'C');
                        $this->Cell(32,7, $maltipal, 1,0, 'C');
                        $this->Ln();
                    }

                    $this->SetFont('Arial', 'B', 12);
                    $this->Ln(10); 
                    $this->Cell(105, 10, "", 0,0, 'C');
                    $this->Cell(40, 10, "Total", 1,0, 'C');
                    $this->Cell(45, 10, $sum, 1,0, 'C');
    }
}
$pdf = new myPDF();
$pdf->AliasNbPages();
$pdf->AddPage('P', 'A4', 0);
$pdf->Start();
$pdf->CustomerName();
$pdf->Output();
?>