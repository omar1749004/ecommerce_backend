<?php
include "../connect.php" ;
$userid   =filtter("userid");
$name     =filtter("name");
$city     =filtter("city");
$street   =filtter("street");
$lat      =filtter("lat");
$long     =filtter("long");


$data =array(
    "address_userId" => $userid,
    "address_name" => $name,
    "address_city" => $city,
    "address_street" => $street,
    "address_lat" => $lat,
    "address_long" => $long,
);
insertData("address",$data);




?>