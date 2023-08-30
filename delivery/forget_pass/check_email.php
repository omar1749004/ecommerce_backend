<?php
include "../connect.php" ;

$email =filtter("email");
$users_verfycode = rand(10000,99999);
$stmt =$connect->prepare("SELECT * FROM `delivery` WHERE delivery_email  = ? ");
$stmt->execute(array($email));
$count = $stmt->rowCount();
if($count>0)
{
    //echo json_encode(array("status" => "success"));
    //sendEmail($email , "Verfiy Code Ecommerce" , "Verfiy Code $verfiycode") ; 
    $data = array("delivery_verfycode" => $users_verfycode);
    updateData("delivery",$data,"delivery_email = '$email'");
    
}else
{
    echo json_encode(array("status" => "fail","msg" =>"notemail"));
}
