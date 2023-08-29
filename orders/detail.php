<?php

include "../connect.php" ;

$id = filtter("id");
getAllData("ordersdetialsview", "orders_id = '$id'")



?>