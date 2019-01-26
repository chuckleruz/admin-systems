<?php
/**
 * Created by PhpStorm.
 * User: jesuslevien
 * Date: 14/01/19
 * Time: 02:39 PM
 */

include("condb.php");

$fname = $_POST['firstname'];
$lname = $_POST['lastname'];
$enrl = $_POST['idenrol'];
$type = $_POST['formpay'];

if($enrl === ""){
    $nms = "SELECT * FROM students_data WHERE firstname = '$fname' and lastname = '$lname'";
    $resp = mysqli_query($con,$nms);

    if($resp->num_rows > 0){
        while ($row = $resp->fetch_array()){
             $enrl = $row['id_enrolment'];
        }
    }
}
$enrlms = $enrl;
echo $enrlms;
file_put_contents("../utils/idstudent.txt", strval($enrlms));
file_put_contents("../utils/typepay.txt", strval($type));


?>