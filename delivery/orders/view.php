<?php

include "../../connect.php" ;

$id  =filtter("id");

getAllData("ordersview" , "1=1' AND orders_statuse = 2 OR (orders_statuse = 3 AND orders_deliveryid =$id )");

?>