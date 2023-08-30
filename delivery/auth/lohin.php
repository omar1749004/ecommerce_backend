<?php
include "../connect.php" ;

$email =filtter("email");
$password  =sha1($_POST["password"]);

// $stmt =$connect->prepare("SELECT * FROM `users` WHERE users_email  = ? AND users_password = ?  AND users_approve = 1");
// $stmt->execute(array($email,$password));
// $count = $stmt->rowCount();
getData("delivery","delivery_email  = ? AND delivery_password = ? " ,array($email,$password));
