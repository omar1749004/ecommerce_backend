<?php

include "../connect.php" ;

$userid =filtter("id") ;


getAllData("ordersview" , "orders_usersid = '$userid' AND orders_statuse != 4");







?>