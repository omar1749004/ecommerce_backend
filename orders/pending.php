<?php

include "../connect.php" ;

$userid =filtter("id") ;


getAllData("ordersview" , "orders_usersid = '$userid' AND rders_statuse != 4");







?>