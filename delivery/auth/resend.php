<?php
include "../../connect.php" ;

$email =filtter("email");
$users_verfycode = rand(10000,99999);
$data =array(
    "delivery_verfycode" => $users_verfycode,
);
updateData("delivery", $data ,"delivery_email = '$email'");
//sendEmail($email , "Verfiy Code Ecommerce" , "Verfiy Code $users_verfycode") ; 
