<?php

include "../../connect.php" ;
$ordersid =filtter("ordersid") ;
$usersid =filtter("usersid");
$type =filtter("orders_type");
if($type == 0){
    $data =array(
        "orders_statuse" => 2
      );
      //sendGCM("success" , "the order has been Approved" ,"users$usersid" ,"" ,"refreshOrderPending");
insertNotify("success" ,"the order has been Prepare", $usersid,"users$usersid","","refreshOrderPending");
// insertNotify("success" ,"the order has been Prepare", $usersid,"users$usersid","","refreshOrderPending");
sendGCM("woring", "there is order wating approve" , "delivery" ,"non" ,"non");

}else{
    $data =array(
        "orders_statuse" => 4
      );
      insertNotify("success" ,"thank you for use Application", $usersid,"users$usersid","","refreshOrderPending");
}

updateData("orders" ,$data ,"orders_id  = '$ordersid' AND orders_statuse = 1");


?>  