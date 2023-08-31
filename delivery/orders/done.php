<?php

include "../../connect.php" ;
$ordersid =filtter("ordersid") ;
$usersid =filtter("usersid");
$data =array(
  "orders_statuse" => 4
);
updateData("orders" ,$data ,"orders_id  = '$ordersid' AND orders_statuse = 3");

//sendGCM("success" , "the order has been Approved" ,"users$usersid" ,"" ,"refreshOrderPending");
insertNotify("success" ,"The order has been delivered", $usersid,"users$usersid","","refreshOrderPending");

sendGCM("woring" ,"Yhe order has been delivered to customer","services","non" ,"non");
?>  