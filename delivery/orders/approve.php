<?php

include "../../connect.php" ;
$ordersid =filtter("ordersid") ;
$usersid =filtter("usersid");
$deliveryid =filtter("deliveryid");
$data =array(
  "orders_statuse" => 3,
  "orders_deliveryid"=> $deliveryid
);
updateData("orders" ,$data ,"orders_id  = '$ordersid' AND orders_statuse = 2");

//sendGCM("success" , "the order has been Approved" ,"users$usersid" ,"" ,"refreshOrderPending");
insertNotify("success" ,"Your Order is on way", $usersid,"users$usersid","","refreshOrderPending");

sendGCM("woring" ,"Your Order Has been Approve by delivery","services","non" ,"non");
sendGCM("woring" ,"the Order Has been Approve by delivery $deliveryid","delivery","non" ,"non");
?>  