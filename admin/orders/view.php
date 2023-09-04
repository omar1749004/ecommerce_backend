<?php

include "../../connect.php" ;

getAllData("ordersview" , "orders_statuse != 4 AND orders_statuse != 0");

?>