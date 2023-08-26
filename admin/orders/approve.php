<?php

include "../../connect.php" ;
$ordersid =filtter("ordersid") ;
$usersid =filtter("usersid");
$data =array(
  "orders_statuse" => 1
);
updateData("orders" ,$data ,"orders_id  = '$ordersid' AND orders_statuse = 0");

sendGCM("success" , "the order has been Approved" ,"users$usersid" ,"" ,"");

?>