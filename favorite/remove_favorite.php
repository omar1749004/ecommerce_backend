<?php
include "../connect.php" ;
$userid =filtter("userid");
$favorite_itemid =filtter("favorite_itemid");

    

deleteData("favorite", "favorite_usersid =$userid AND favorite_itemid = $favorite_itemid" )

?>