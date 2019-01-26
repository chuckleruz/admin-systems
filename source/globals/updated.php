<?php
/**
 * Created by PhpStorm.
 * User: jesuslevien
 * Date: 24/01/19
 * Time: 11:27 AM
 */
include('condb.php');

$fname = $_POST['firstname'];
$lname = $_POST['lastname'];
$idenrol = $_POST['idenrol'];

 $sql = "UPDATE students_data SET id_enrolment = '$idenrol' WHERE firstname = '$fname' and lastname = '$lname'";
  if(mysqli_query($con,$sql)){
      echo "Updated";
  }else{
      echo "Error Fatal at Updated";
  }
?>

