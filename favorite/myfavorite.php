<?php

include "../connect.php" ;
$id =filtter("id");
getAllData("myfavorite","favorite_usersid = $id")


?>