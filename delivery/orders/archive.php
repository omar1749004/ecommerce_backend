<?php

include "../../connect.php" ;
$id  =filtter("id");
getAllData("ordersview" , "orders_deliveryid = $id AND orders_statuse = 4");

?>