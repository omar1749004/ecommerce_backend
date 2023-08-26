<?php
include "../connect.php" ;

$name  = filtter("name") ;
$email =filtter("email");
$phone =filtter("phone");
$password  =sha1($_POST["password"]);
$users_verfycode = rand(10000,99999);
// $users_approve     =filtter("users_approve");
// $users_creat     =filtter("users_creat");
// $users_verfycode     =filtter("users_image");


$stmt =$connect->prepare("SELECT * FROM `users` WHERE users_email  = ? OR users_phone = ? ");
$stmt->execute(array($email,$phone));

$count = $stmt->rowCount();
// $stmt =$connect->prepare("INSERT INTO `users`( `username`, `email`, `password`) VALUES (?,?,?)");
// $stmt->execute(array($username,$email,$password));
// $count = $stmt->rowCount();
if($count>0)
{
    
    echo json_encode(array("status" => "fail", "message" => "repet email"));
}
else{

    $data =array(
        "users_name" => $name,
        "users_email" => $email,
        "users_phone" => $phone ,
        "users_password" => $password,
        "users_verfycode" => $users_verfycode,
    );
    //sendEmail($email , "Verfiy Code Ecommerce" , "Verfiy Code $verfiycode") ; 
    insertData("users" ,$data );

}
?>