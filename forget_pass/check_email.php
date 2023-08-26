<?php
include "../connect.php" ;

$email =filtter("email");
$users_verfycode = rand(10000,99999);
$stmt =$connect->prepare("SELECT * FROM `users` WHERE users_email  = ? ");
$stmt->execute(array($email));
$count = $stmt->rowCount();
if($count>0)
{
    //echo json_encode(array("status" => "success"));
    //sendEmail($email , "Verfiy Code Ecommerce" , "Verfiy Code $verfiycode") ; 
    $data = array("users_verfycode" => $users_verfycode);
    updateData("users",$data,"users_email = '$email'");
    
}else
{
    echo json_encode(array("status" => "fail","msg" =>"notemail"));
}
