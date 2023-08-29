<?php

include "../connect.php" ;

$id =filtter("id") ;
deleteData("orders" ,"orders_id ='$id' AND orders_statuse = 0")




?>