<?php
include "../connect.php" ;
$userid =filtter("userid");
$favorite_itemid =filtter("favorite_itemid");
$data =array(
    "favorite_usersid" => $userid,
    "favorite_itemid"  => $favorite_itemid
);
insertData("favorite", $data)

?>