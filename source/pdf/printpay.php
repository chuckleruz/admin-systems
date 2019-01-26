<?php
/**
 * Created by PhpStorm.
 * User: jesuslevien
 * Date: 10/01/19
 * Time: 10:49 AM
 */

session_start();
if (isset($_SESSION['username'])) {
    include("template.php");
    include("../globals/condb.php");

    $sql = "SELECT pagos.folio,pagos.cantidad,pagos.forma_pago,pagos.fecha_de_pago,pagos.quien_recibe,
                    pagos.quien_paga,pagos.materia,pagos.otros,pagos.completo_parcial,
                    pagos.otros, al.matricula,al.nombre,al.apellido_paterno FROM pagos 
                    JOIN pagos_alumnos as pgal on pgal.id_pagos=pagos.id_pago 
                    JOIN alumnos as al on al.id_alumno=pgal.id_alumnos 
                    WHERE pgal.id_pagosalumnos=(SELECT MAX(id_pagosalumnos) FROM pagos_alumnos)";

    $result = mysqli_query($con, $sql);

    if ($result->num_rows > 0) {
        while ($row = $result->fetch_array()) {
            $name = $row['nombre'];
            $app = $row['apellido_paterno'];
            $folio = $row['folio'];
            $matr = $row['matricula'];
            $assg = $row['materia'];
            $shapep = $row['forma_pago'];
            $amountp = $row['cantidad'];
            $compar = $row['completo_parcial'];
            $datep = $row['fecha_de_pago'];
            $get = $row['quien_recibe'];
            $getp = $row['quien_paga'];
            $oth = $row['otros'];
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
    $pdf->Cell(190, 6, 'ID Alumno: ' . utf8_decode($matr), 0, 1, 'L', 1);
    $pdf->Cell(190, 6, 'Nombre: ' . utf8_decode($name . ' ' . $app), '0', '1', 'L', 1);
    $pdf->Cell(190, 6, 'Materia: ' . utf8_decode($assg), '0', '1', 'L', 1);
    $pdf->SetFont('Arial', 'B', '15');
    $pdf->Cell(190, 15, utf8_decode('INFORMACIÓN DEL PAGO'), 0, 1, 'C');
    $pdf->SetFont('Arial', 'B', '11');
    $pdf->Cell(55, 6, 'Forma de Pago: ' . utf8_decode($shapep), '0', '0', 'L', 1);
    $pdf->Cell(80, 6, 'Cantidad Pagada: $' . utf8_decode($amountp) . '.00 MXN', '0', '0', 'L', 1);
    $pdf->Cell(55, 6, 'Completo/Parcial: ' . utf8_decode($compar), '0', '1', 'L', 1);
    $pdf->Cell(190, 6, '', 0, 1);
    $pdf->Cell(190, 6, 'Fecha de Pago: ' . utf8_decode($datep), '0', '1', 'C', 1);
    $pdf->Cell(190, 12, '', 0, 1, '', 1);
    $pdf->Cell(100, 6, utf8_decode('Recibí de: ' . $getp), '', '0', 'L', 1);
    $pdf->Cell(90, 6, 'Quien Recibe el Pago: ' . utf8_decode($get), '0', '1', 'R', 1);
    $pdf->SetFont('Arial', 'B', '15');
    $pdf->Cell(190, 12, 'ADICIONALES', 0, 1, 'C');
    $pdf->SetFont('Arial', 'B', '11');
    $pdf->Cell(190, 15, 'Otros Conceptos: ' . utf8_decode($oth), '0', '1', 'L', 1);
    $pdf->Output();
}
?>