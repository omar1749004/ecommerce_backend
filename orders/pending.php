<?php

include "../connect.php" ;

$userid =filtter("id") ;


getAllData("ordersdetialsview" , "orders_usersid = '$userid'");







?>