<?php

include "../connect.php" ;

$userid =filtter("id") ;


getAllData("orders" , "orders_usersid = '$userid'");







?>