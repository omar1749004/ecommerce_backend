<?php
include "../connect.php" ;

$email = filtter("email");
$password  =sha1($_POST["password"]);

$data = array("users_password" => $password) ; 
updateData("users" , $data , " users_email = '$email'");
?>