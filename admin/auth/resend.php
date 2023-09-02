<?php
include "../../connect.php" ;

$email =filtter("email");
$users_verfycode = rand(10000,99999);
$data =array(
    "admin_verfycode" => $users_verfycode,
);
updateData("admin", $data ,"admin_email	 = '$email'");
//sendEmail($email , "Verfiy Code Ecommerce" , "Verfiy Code $users_verfycode") ; 
