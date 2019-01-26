<?php
require('fpdf/fpdf.php');

$date = getdate();
$day = $date['mday'];
$mon = $date['mon'];
$year =$date['year'];
$hou = $date['hours'];
$sec = $date['seconds'];
$min = $date['minutes'];

$dates = "$year$mon$day$sec$min$hou";

class PDF_JavaScript extends FPDF {

    protected $javascript;
    protected $n_js;

    function IncludeJS($script, $isUTF8=false) {
        if(!$isUTF8)
            $script=utf8_encode($script);
        $this->javascript=$script;
    }

    function _putjavascript() {
        $this->_newobj();
        $this->n_js=$this->n;
        $this->_put('<<');
        $this->_put('/Names [(EmbeddedJS) '.($this->n+1).' 0 R]');
        $this->_put('>>');
        $this->_put('endobj');
        $this->_newobj();
        $this->_put('<<');
        $this->_put('/S /JavaScript');
        $this->_put('/JS '.$this->_textstring($this->javascript));
        $this->_put('>>');
        $this->_put('endobj');
    }

    function _putresources() {
        parent::_putresources();
        if (!empty($this->javascript)) {
            $this->_putjavascript();
        }
    }

    function _putcatalog() {
        parent::_putcatalog();
        if (!empty($this->javascript)) {
            $this->_put('/Names <</JavaScript '.($this->n_js).' 0 R>>');
        }
    }
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
        $this->Cell(5,2,'LEVDATA',0,1,'C');
        $this->SetX(26);
        $this->SetFont('Arial','B','5');
        $this->Cell(5,2,'PLAZA TEPEACA',0,1,'C');

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