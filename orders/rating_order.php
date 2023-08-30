<?php

include "../connect.php" ;
$orderid =filtter("orderid");
$rating  =filtter("rating");
$ratingNote =filtter("ratingNote");
$data =array(
    "orders_rating" => $rating ,
    "orders_ratingnote"=> $ratingNote,
);
updateData("orders",$data ,"orders_id  ='$orderid'");




?>