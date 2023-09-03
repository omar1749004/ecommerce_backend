<?php
include "../../connect.php" ;

$name =filtter("name");
$name_ar =filtter("name_ar");


$imageanme = imageUpload( "../../upload","files") ;

$data =array(
  "categories_name" => $name,
  "categories_name_ar" => $name_ar,
  "categories_image" => $imageanme
);

insertData("categories", $data) ;


?>