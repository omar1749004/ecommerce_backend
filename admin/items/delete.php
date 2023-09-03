<?php

include "../../connect.php" ;

$id =filtter("id");
$image =filtter("imageName");

deleteFile("../../upload" ,$image);

deleteData("items", "item_id  = $id") ;


?>