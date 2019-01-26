<?php
/**
 * Created by PhpStorm.
 * User: jesuslevien
 * Date: 9/01/19
 * Time: 11:41 AM
 */

session_start();
include("condb.php");

$users = $_POST['user'];
$passw = $_POST['password'];

if(isset($users) && !empty($users) && isset($passw) && !empty($passw)){

    $sql = "SELECT users, password FROM generals_data WHERE users='$users' ";

    $result = $con->query($sql);
    $row = $result->fetch_array();

    if($passw == $row['password']){

        $_SESSION['username'] = $users;
        echo "True";
    }else{
        echo "False";
    }


}else{
    echo "Access Denied";
}
?>