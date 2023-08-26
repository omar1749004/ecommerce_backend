<?php


include "../connect.php" ;



$addressid  =filtter("address_id");

deleteData("address", "address_id = $addressid" )


?>