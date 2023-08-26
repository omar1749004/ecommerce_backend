<?php


include "../connect.php" ;



$userid =filtter("userid");
$itemid =filtter("itemid");

deleteData("cart", "cart_id = (SELECT cart_id FROM `cart` WHERE cart_userid = '$userid' AND cart_itemsid = '$itemid' AND cart_orders = 0 LIMIT 1) " )


?>