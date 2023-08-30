<?php
include "../connect.php" ;

$email = filtter("email");
$verfycode = filtter("verfycode");

$stmt =$connect->prepare("SELECT * FROM `delivery` WHERE delivery_email = ? AND delivery_approve = ?");
$stmt->execute(array($email,$verfycode));

$count =$stmt->rowCount();
if($count >0)
{    
    $data = array("delivery_approve" => "1") ; 
    updateData("delivery" , $data , " delivery_email = '$email'");
}else
{
    echo json_encode(array("status" => "fail", "msg" => "notverfycode"));
}
?>