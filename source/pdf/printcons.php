<?php
/**
 * Created by PhpStorm.
 * User: jesuslevien
 * Date: 14/01/19
 * Time: 06:09 PM
 */

session_start();
if (isset($_SESSION['username'])) {
    include("template.php");
    include("../globals/condb.php");


    $file = fopen("../utils/idstudent.txt","r") or die ("Error Fatal 1");

    while(!feof($file)){

        $enrolm = fgets($file);
    }

    $fols = $_POST['prints'];


    $sql = "SELECT payments.folio,payments.amount,payments.metpay,payments.dateofpay,payments.whoget,
                    payments.whopay,payments.assignatures,payments.additional,payments.formpay,
                    st.id_enrolment,st.firstname,st.lastname FROM payments 
                    JOIN students_payments as smts on smts.id_paymtst=payments.id_payment 
                    JOIN students_data as st on st.id_students=smts.id_stupay 
                    WHERE st.id_enrolment = '$enrolm' and payments.folio = '$fols'";

    $result = mysqli_query($con, $sql) or die("Error");

    if ($result->num_rows > 0) {
        while ($row = $result->fetch_array()) {
            $fname = $row['firstname'];
            $lname = $row['lastname'];
            $folio = $row['folio'];
            $enrl = $row['id_enrolment'];
            $assg = $row['assignatures'];
            $metpay = $row['metpay'];
            $amount = $row['amount'];
            $formpay = $row['formpay'];
            $dateof = $row['dateofpay'];
            $get = $row['whoget'];
            $pay = $row['whopay'];
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
    $pdf = new PDF();
    $pdf->AliasnbPages();
    $pdf->AddPage();
    $pdf->SetFont('Arial', 'B', '10');
    $pdf->SetX(70);
    $pdf->Cell(130, 6, 'Fecha: ' . $dts, '0', '1', 'R');
    $pdf->SetX(70);
    $pdf->Cell(130, 6, 'Hora: ' . $hours, '0', '1', 'R');
    $pdf->SetX(70);
    $pdf->Cell(130, 6, 'folio: ' . utf8_decode($folio), '0', '0', 'R');
    $pdf->Cell(50, 6, '', 0, 1, 'L');
    $pdf->SetFont('Arial', 'B', '15');
    $pdf->SetFillColor(232, 232, 232);
    $pdf->Cell(190, 15, 'DATOS DEL ALUMNO', 0, 1, 'C');
    $pdf->SetFont('Arial', 'B', '12');
    $pdf->Cell(190, 6, 'ID Alumno: ' . utf8_decode($enrl), 0, 1, 'L', 1);
    $pdf->Cell(190, 6, 'Nombre: ' . utf8_decode($fname . ' ' . $lname), '0', '1', 'L', 1);
    $pdf->Cell(190, 6, 'Materia: ' . utf8_decode($assg), '0', '1', 'L', 1);
    $pdf->SetFont('Arial', 'B', '15');
    $pdf->Cell(190, 15, utf8_decode('INFORMACIÓN DEL PAGO'), 0, 1, 'C');
    $pdf->SetFont('Arial', 'B', '11');
    $pdf->Cell(55, 6, 'Forma de Pago: ' . utf8_decode($metpay), '0', '0', 'L', 1);
    $pdf->Cell(80, 6, 'Cantidad Pagada: $' . utf8_decode($amount) . '.00 MXN', '0', '0', 'L', 1);
    $pdf->Cell(55, 6, 'Completo/Parcial: ' . utf8_decode($formpay), '0', '1', 'L', 1);
    $pdf->Cell(190, 6, '', 0, 1);
    $pdf->Cell(190, 6, 'Fecha de Pago: ' . utf8_decode($dateof), '0', '1', 'C', 1);
    $pdf->Cell(190, 12, '', 0, 1, '', 1);
    $pdf->Cell(100, 6, utf8_decode('Recibí de: ' . $get), '', '0', 'L', 1);
    $pdf->Cell(90, 6, 'Quien Recibe el Pago: ' . utf8_decode($pay), '0', '1', 'R', 1);
    $pdf->SetFont('Arial', 'B', '15');
    $pdf->Cell(190, 12, 'ADICIONALES', 0, 1, 'C');
    $pdf->SetFont('Arial', 'B', '11');
    $pdf->Cell(190, 15, 'Otros Conceptos: ' . utf8_decode($addt), '0', '1', 'L', 1);
    $pdf->Output();
}
?>