<?php
include "../../connect.php" ;

$id =filtter("id");
$name =filtter("name");
$name_ar =filtter("name_ar");
$oldimage =filtter("oldimagename");

 $imagename = imageUpload( "../../upload","files") ;
if($imagename =="empty"){
    $data =array(
        "categories_name" => $name,
        "categories_name_ar" => $name_ar,
      );
}else{
    deleteFile("../../upload" ,$oldimage);
    $data =array(
        "categories_name" => $name,
        "categories_name_ar" => $name_ar,
        "categories_image" => $imagename
      );
      
}

updateData("categories", $data ,"categories_id = $id") ;


?>