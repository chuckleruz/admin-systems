<?php
/**
 * Created by PhpStorm.
 * User: jesuslevien
 * Date: 7/01/19
 * Time: 08:56 AM
 */

include("condb.php");

$enrl = $_GET['enrol'];
$enrlm = $_GET['enrlm'];
$fol = $_GET['folio'];

function getEnrolment($enrl){
    global $con;
    $sql = "SELECT assignatures.nameassg,st.firstname,st.lastname 
            FROM assignatures 
            JOIN students_assignatures AS stas ON stas.id_assgst=assignatures.id_assg 
            JOIN students_data AS st ON st.id_students=stas.id_studentasg 
            WHERE st.id_enrolment='$enrl'";
    $result = mysqli_query($con,$sql)or die("Error");
    if ($result->num_rows > 0) {
        $pay = $result->fetch_object();
        $pay->status = 200;
        echo json_encode($pay);
    }else{
        $error = array('status' => 400);
        echo json_encode((object)$error);
    }

}

function getEnrolmentCon($enrlm){
    global $con;
    $sql = "SELECT students_data.firstname,students_data.lastname,pmt.folio 
            FROM students_data
            JOIN students_payments AS stpt ON stpt.id_stupay=students_data.id_students 
            JOIN payments AS pmt ON pmt.id_payment=stpt.id_paymtst 
            WHERE students_data.id_enrolment='$enrlm'";
    $result = mysqli_query($con,$sql)or die("Error");
    if ($result->num_rows > 0) {
        $pagos = $result->fetch_object();
        $pagos->status = 200;
        echo json_encode($pagos);
    }else{
        $error = array('status' => 400);
        echo json_encode((object)$error);
    }

}

function getFolio($fol){
    global $con;
    $sql = "SELECT students_data.firstname, students_data.lastname, students_data.id_enrolment FROM students_data 
        JOIN students_payment AS ptst ON ptst.id_stupay=alumnos.id_students JOIN payments AS ptm ON ptm.id_payment=ptst.id_paymtst 
        WHERE pmt.folio='$fol'";
    $result = mysqli_query($con,$sql)or die("Error Fatal");
    if ($result->num_rows > 0) {
        $pagos = $result->fetch_object();
        $pagos->status = 200;
        echo json_encode($pagos);
    }else{
        $error = array('status' => 400);
        echo json_encode((object)$error);
    }

}


if($enrl){
 getEnrolment($enrl);
}else if($enrlm){
    getEnrolmentCon($enrlm);
}else if($fol){
    getFolio($fol);
}

?>