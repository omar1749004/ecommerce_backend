<?php

include "../connect.php" ;
$id =filtter("userid");
getAllData("address", "address_userId = $id")



?>