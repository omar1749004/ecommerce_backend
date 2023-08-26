<?php
include "../connect.php" ;

$email =filtter("email");
$users_verfycode = rand(10000,99999);
$data =array(
    "users_verfycode" => $users_verfycode,
);
updateData("users", $data ,"users_email = '$email'");
//sendEmail($email , "Verfiy Code Ecommerce" , "Verfiy Code $users_verfycode") ; 
