<?php

include "../../connect.php" ;

$id  =filtter("id");

getAllData("ordersview" , "orders_statuse = 3 AND orders_deliveryid =$id");

?>