<?php
include "../../connect.php" ;

$email = filtter("email");
$verfycode = filtter("verfycode");

$stmt =$connect->prepare("SELECT * FROM `admin` WHERE admin_email = ? AND admin_approve = ?");
$stmt->execute(array($email,$verfycode));

$count =$stmt->rowCount();
if($count >0)
{    
    $data = array("admin_approve" => "1") ; 
    updateData("admin" , $data , " admin_email = '$email'");
}else
{
    echo json_encode(array("status" => "fail", "msg" => "notverfycode"));
}
?>