<?php
/**
 * Created by PhpStorm.
 * User: jesuslevien
 * Date: 14/01/19
 * Time: 06:42 PM
 */

?>


<?php

session_start();
if (isset($_SESSION['username'])) {
    include("../globals/condb.php");
    require('pdf_js.php');

    $sql = "SELECT payments.folio,payments.amount,payments.metpay,payments.dateofpay,payments.whoget,
                    payments.whopay,payments.assignatures,payments.additional,payments.formpay,
                    st.id_enrolment,st.firstname,st.lastname FROM payments
                    JOIN students_payments as stmt on stmt.id_paymtst=payments.id_payment
                    JOIN students_data as st on st.id_students=stmt.id_stupay
                    WHERE stmt.id_paymtst=(SELECT MAX(id_paymtst) FROM students_payments)";

    $result = mysqli_query($con, $sql);

    if ($result->num_rows > 0) {
        while ($row = $result->fetch_array()) {
            $fname = $row['firstname'];
            $lname = $row['lastname'];
            $folio = $row['folio'];
            $enrl = $row['id_enrolment'];
            $assg = $row['assignatures'];
            $shapep = $row['metpay'];
            $amountp = $row['amount'];
            $type = $row['formpay'];
            $datep = $row['dateofpay'];
            $get = $row['whoget'];
            $wpay = $row['whopay'];
            $addt = $row['additional'];
        }
    }

    $day = $date['mday'];
    $mon = $date['month'];
    $year = $date['year'];
    $hou = $date['hours'];
    $sec = $date['seconds'];
    $min = $date['minutes'];
    $dts = "$day-$mon-$year";
    $hours = "$hou:$min:$sec";
    global $wpay;
    global $addt;

    class PDF_AutoPrint extends PDF_JavaScript
    {
        public  $server = "";
        public  $printer = "";

        function AutoPrint($dialog=false)
        {
            //Open the print dialog or start printing immediately on the standard printer
            $param=($dialog ? 'true' : 'false');
            $script="print($param);";
            $this->IncludeJS($script);
        }
        function AutoPrintToPrinter($server, $printer, $dialog=false)
        {
            //Print on a shared printer (requires at least Acrobat 6)
            $script = "var pp = getPrintParams();";
            if($dialog)
                $script .= "pp.interactive = pp.constants.interactionLevel.full;";
            else
                $script .= "pp.interactive = pp.constants.interactionLevel.automatic;";
            $script .= "pp.printerName = '\\\\\\\\".$server."\\\\".$printer."';";
            $script .= "print(pp);";
            $this->IncludeJS($script);
        }

    }

    $pdf = new PDF_AutoPrint($orientation = 'P', $unit = 'mm', array(58, 100));
    $pdf->AddPage();
    $pdf->SetFont('Arial', 'B', 8);
    $foot = "Cliente";
    $pdf->SetFillColor(232, 232, 232);
    $textypos = 5;
    $pdf->setY(18);
    $pdf->setX(12);
    $pdf->Cell(5, 5, "DATOS DEL ALUMNO", 0, 1);
    $pdf->SetFont('Arial', '', 5);
    $pdf->setX(3);
    $pdf->Cell(52, 3, 'ID Alumno: ' . utf8_decode($enrl), 0, 1, 'L', 1);
    $pdf->setX(3);
    $pdf->Cell(52, 3, 'Nombre: ' . utf8_decode($fname . ' ' . $lname), '0', '1', 'L', 1);
    $pdf->setX(3);
    $pdf->Cell(52, 3, 'Materia: ' . utf8_decode($assg), '0', '1', 'L', 1);
    $pdf->SetFont('Arial', 'B', '8');
    $pdf->setX(10);
    $pdf->Cell(52, 5, utf8_decode('INFORMACIÓN DEL PAGO'), 0, 1);
    $pdf->SetFont('Arial', '', 5);
    $pdf->setX(3);
    $pdf->Cell(52, 3, 'Forma de Pago: ' . utf8_decode($shapep), '0', '1', 'L', 1);
    $pdf->setX(3);
    $pdf->Cell(52, 3, 'Cantidad Pagada: $' . utf8_decode($amountp) . '.00 MXN', '0', '1', 'L', 1);
    $pdf->setX(3);
    $pdf->Cell(52, 3, 'Completo/Parcial: ' . utf8_decode($type), '0', '1', 'L', 1);
    $pdf->setX(3);
    $pdf->Cell(52, 3, 'Fecha de Pago: ' . utf8_decode($datep), '0', '1', 'L', 1);
    $pdf->setX(3);
    $pdf->Cell(52, 3, utf8_decode('Recibí de: ' . $wpay), '', '1', 'L', 1);
    $pdf->setX(3);
    $pdf->Cell(52, 3, 'Quien Recibe el Pago: ' . utf8_decode($get), '0', '1', 'L', 1);
    $pdf->SetFont('Arial', 'B', '8');
    $pdf->setX(17);
    $pdf->Cell(5, 5, "ADICIONALES", 0, 1);
    $pdf->SetFont('Arial', '', 5);
    $pdf->setX(3);
    $pdf->Cell(52, 5, 'Otros Conceptos: ' . utf8_decode($addt), '0', '1', 'L', 1);


    $pdf->AddPage();
    $pdf->SetFont('Arial', 'B', 8);
    $foot = "Kumon";
    $pdf->SetFillColor(232, 232, 232);
    $pdf->setY(18);
    $pdf->setX(12);
    $pdf->Cell(5, 5, "DATOS DEL ALUMNO", 0, 1);
    $pdf->SetFont('Arial', '', 5);
    $pdf->setX(3);
    $pdf->Cell(52, 3, 'ID Alumno: ' . utf8_decode($enrl), 0, 1, 'L', 1);
    $pdf->setX(3);
    $pdf->Cell(52, 3, 'Nombre: ' . utf8_decode($fname . ' ' . $lname), '0', '1', 'L', 1);
    $pdf->setX(3);
    $pdf->Cell(52, 3, 'Materia: ' . utf8_decode($assg), '0', '1', 'L', 1);
    $pdf->SetFont('Arial', 'B', '8');
    $pdf->setX(10);
    $pdf->Cell(52, 5, utf8_decode('INFORMACIÓN DEL PAGO'), 0, 1);
    $pdf->SetFont('Arial', '', 5);
    $pdf->setX(3);
    $pdf->Cell(52, 3, 'Forma de Pago: ' . utf8_decode($shapep), '0', '1', 'L', 1);
    $pdf->setX(3);
    $pdf->Cell(52, 3, 'Cantidad Pagada: $' . utf8_decode($amountp) . '.00 MXN', '0', '1', 'L', 1);
    $pdf->setX(3);
    $pdf->Cell(52, 3, 'Completo/Parcial: ' . utf8_decode($type), '0', '1', 'L', 1);
    $pdf->setX(3);
    $pdf->Cell(52, 3, 'Fecha de Pago: ' . utf8_decode($datep), '0', '1', 'L', 1);
    $pdf->setX(3);
    $pdf->Cell(52, 3, utf8_decode('Recibí de: ' . $wpay), '', '1', 'L', 1);
    $pdf->setX(3);
    $pdf->Cell(52, 3, 'Quien Recibe el Pago: ' . utf8_decode($get), '0', '1', 'L', 1);
    $pdf->SetFont('Arial', 'B', '8');
    $pdf->setX(17);
    $pdf->Cell(5, 5, "ADICIONALES", 0, 1);
    $pdf->SetFont('Arial', '', 5);
    $pdf->setX(3);
    $pdf->Cell(52, 5, 'Otros Conceptos: ' . utf8_decode($addt), '0', '1', 'L', 1);
    $pdf->AutoPrint();
    $pdf->Output();
}
?>
