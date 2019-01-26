<?php
/**
 * Created by PhpStorm.
 * User: jesuslevien
 * Date: 27/12/18
 * Time: 11:03 AM
 */

include("condb.php");

$get = $_POST['whopay'];
$getp = $_POST['whoget'];
$datep = $_POST['dateofpay'];
$shapep = $_POST['metpay'];
$amountp = $_POST['amountpay'];
$folio = $_POST['folio'];
$note = $_POST['notes'];
$assg = $_POST['assignature'];
$type = $_POST['formpay'];
$fname  = $_POST['firstname'];
$lname = $_POST['lastname'];
$enrl = $_POST['enrolment'];


if($enrl === ""){
    $nam = "SELECT * FROM students_data WHERE firstname='$fname' and lastname='$lname'";
    $result = $con->query($nam);

    if($result->num_rows > 0 ){
        while ($nams = $result->fetch_array()){

            $idstu = $nams['id_students'];
            $enrlmt = $nams['id_enrolment'];

        }
    }
}else{
    $enr = "SELECT * FROM students_data WHERE id_enrolment='$enrl'";
    $res = $con->query($enr);

    if($res->num_rows > 0 ){
        while ($row = $res->fetch_array()){

            $idstu = $row['id_students'];

        }
    }
}

if($assg === ""){
    global $idstu;
    $stud = "SELECT assignatures.nameassg as namekey,st.firstname,st.lastname 
            FROM assignatures 
            JOIN students_assignatures AS sta ON sta.id_assgst=assignatures.id_assg 
            JOIN students_data AS st ON st.id_students=sta.id_studentasg
            WHERE st.id_students='$idstu'";
    $result = mysqli_query($con,$stud);
    if($result->num_rows > 0){
        while ($row = $result->fetch_array()){
            $getassg = $row['namekey'];
            if($getassg === "Both(SP,MAT)"){
                $assg = "Español, Matemáticas";
            }else{
                $assg = $getassg;
            }
        }
    }
}

foreach (array_keys($_POST['addit']) as $key) {
    $adtl = $_POST['addit'][$key];

    if($_POST['addit'] > 1){
        $adtl = implode($adtl = $_POST['addit'],',');
    }
}
echo $adtl;

$pay = "INSERT INTO payments(folio,amount,metpay,dateofpay,whoget,whopay,assignatures,additional,formpay,commits)
        VALUES ('$folio','$amountp','$shapep','$datep','$getp','$get','$assg','$adtl','$type','$note')";
if(mysqli_query($con,$pay)){
    $idpayl = "SELECT * FROM payments WHERE folio='$folio'";
    $resp = mysqli_query($con,$idpayl);
    if($resp){
        while($row = $resp->fetch_array()){
            $idpy = $row['id_payment'];
            global $idstu;

            $sql = "INSERT INTO students_payments(id_stupay,id_paymtst) VALUES ('$idstu','$idpy')";
            if(mysqli_query($con,$sql)){
                $fols= $folio + 1;
                file_put_contents("../utils/folio.txt", strval($fols));
                echo "True";
            }else{
                echo "Error Fatal Students Payments";
            }
        }
    }
}else{
    echo "Error Fatal";
}

?>


