<?php

include "../../connect.php" ;

$id =filtter("id");
$image =filtter("imageName");

deleteFile("../../upload" ,$image);

deleteData("categories", "categories_id = $id") ;


?>