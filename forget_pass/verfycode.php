<?php
include "../connect.php" ;

$email = filtter("email");
$verfycode = filtter("verfycode");

$stmt =$connect->prepare("SELECT * FROM `users` WHERE users_email = ? AND users_verfycode = ?");
$stmt->execute(array($email,$verfycode));

$count =$stmt->rowCount();
if($count >0)
{    
    echo json_encode(array("status" => "success"));
}else
{
    echo json_encode(array("status" => "fail", "msg" => "notverfycode"));
}
?>