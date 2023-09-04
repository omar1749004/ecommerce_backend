<?php
include "../../connect.php" ;

$name =filtter("name");
$name_ar =filtter("name_ar");
$desc =filtter("desc");
$desc_ar =filtter("desc_ar");
$count =filtter("count");
$active =filtter("active");
$price =filtter("price");
$descound =filtter("descound");
$category =filtter("category");
$dateNow  =filtter("dateNow");


$imageanme = imageUpload( "../../upload","files") ;

$data = array(
  "item_name" => $name,
  "item_name_ar" => $name_ar,
  "item_desc" => $desc,
  "item_desc_ar" => $desc_ar,
  "items_count" => $count,
  "item_active" => $active,
  "item_price" => $price,
  "item_descound" => $descound,
  "item_c" => $category,
  "item_date" => $dateNow,
  "item_image" => $imageanme
);

insertData("items", $data) ;


?>