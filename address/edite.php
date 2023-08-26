<?php
include "../connect.php" ;
$addressid   = filtter("addressid");
$name        = filtter("name");
$city        = filtter("city");
$street      = filtter("street");
$lat         = filtter("lat");
$long        = filtter("long");


$data =array(
    "address_city" => $city,
    "address_name" => $name,
    "address_street" => $street,
    "address_lat" => $lat,
    "address_long" => $long,
);
updateData("address",$data,"address_id = $addressid");




?>