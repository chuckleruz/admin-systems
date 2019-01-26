<?php
/**
 * Created by PhpStorm.
 * User: jesuslevien
 * Date: 4/01/19
 * Time: 06:48 PM
 */

include("condb.php");

$sql = "SELECT * FROM students_data";
$result = mysqli_query($con,$sql);
$array = array();
if($result){
    while ($row = $result->fetch_array()) {
        $mat = utf8_encode($row['id_enrolment']);
        array_push($array, $mat);// enrolment
    }
}


$pay = "SELECT * FROM payments";
$res = mysqli_query($con,$pay);
$arapay = array();
if ($res){
    while ($row = $res->fetch_array()){
        $folio = utf8_encode($row['folio']);
        array_push($arapay, $folio);
    }
}

$file = fopen("utils/folio.txt","r") or die ("Error Fatal 1");

while(!feof($file)){

    $get = fgets($file);
}

$date = getdate();
$day = $date['mday'];
$mon = $date['mon'];
$year = $date['year'];

$_SESSION['day'] = $date['mday'];
$_SESSION['mon'] = $date['month'];
$_SESSION['year'] = $date['year'];

$sql ="SELECT * FROM generals_data";
$result = mysqli_query($con,$sql);
if($result->num_rows >0){
    while ($row = $result->fetch_array()){
        $_SESSION['center'] = $row['center1'];
        $_SESSION['number'] = $row['number1'];
    }
}

?>