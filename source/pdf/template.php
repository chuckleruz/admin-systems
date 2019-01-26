<?php
/**
 * Created by PhpStorm.
 * User: jesuslevien
 * Date: 10/01/19
 * Time: 12:07 PM
 */

require "fpdf/fpdf.php";

    $date = getdate();
    $day = $date['mday'];
    $mon = $date['mon'];
    $year =$date['year'];
    $hou = $date['hours'];
    $sec = $date['seconds'];
    $min = $date['minutes'];

    $dates = "$year$mon$day$sec$min$hou";

    class PDF extends FPDF{

        function Header(){
            global $dates;

            $this->Image('../design/imgs/s-l300.jpg',5,5,30);
            $this->SetFont('Arial','I','8');
            $this->SetX(75);
            $this->Cell(130, 5, $dates, 0, 1, 'R');
            $this->SetFont('Arial','B','15');
            $this->Cell(30);
            $this->Cell(120,10,'COMPROBANTE DE PAGO',0,1,'C');
            $this->SetFont('Arial','B','10');
            $this->SetX(40);
            $this->Cell(120,5,'KUMON',0,1,'C');
            $this->SetX(40);
            $this->SetFont('Arial','B','10');
            $this->Cell(120,5,'PLAZA CENTRO MAYOR ZAVALETA',0,1,'C');

            $this->Ln(10);
        }

        function Footer(){

            global $dates;

            $this->SetY(-15);
            $this->SetFont('Arial','I','8');
            $this->Cell(0,10,'Pagina '.$this->PageNo().'/{nb}',0,0,'C');
            $this->SetFont('Arial','B','6');
            $this->SetX(75);
            $this->Cell(130, 5, $dates, 0, 1, 'R');

        }
    }
?>