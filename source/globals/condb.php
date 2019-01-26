<?php
/**
 * Created by PhpStorm.
 * User: jesuslevien
 * Date: 10/01/19
 * Time: 12:28 PM
 */

include("connection.php");

$con = mysqli_connect($host, $user, $pasw,$db) or die("Error, Problems to connect with the server");
mysqli_select_db($con,"administrator") or die("Error, Problems to connect with the db");

mysqli_set_charset($con,"utf8");

?>