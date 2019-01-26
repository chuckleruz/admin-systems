<?php
/**
 * Created by PhpStorm.
 * User: jesuslevien
 * Date: 15/01/19
 * Time: 09:21 AM
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

        //$this->Image('../design/imgs/s-l300.jpg',3,2,6);
        $this->SetFont('Arial','I','4');
        $this->SetY(1);
        $this->SetX(50);
        $this->Cell(5, 5, $dates, 0, 1, 'R');
        $this->SetFont('Arial','B','8');
        $this->setX(26);
        $this->Cell(5,5,'COMPROBANTE DE PAGO',0,1,'C');
        $this->SetFont('Arial','B','6');
        $this->SetX(26);
        $this->Cell(5,2,'KUMON',0,1,'C');
        $this->SetX(26);
        $this->SetFont('Arial','B','5');
        $this->Cell(5,2,'PLAZA CENTRO MAYOR ZAVALETA',0,1,'C');

        $this->Ln(10);
    }

    function Footer(){

        global $dates;
        global $foot;

        $this->SetY(-15);
        $this->SetFont('Arial','I','6');
        $this->Cell(0,10,$foot,0,0,'C');
        $this->SetFont('Arial','I','4');
        $this->SetY(-8);
        $this->SetX(50);
        $this->Cell(5, 5, $dates, 0, 1, 'R');

    }
}


?>