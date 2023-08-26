<?php


include "../connect.php" ;

$favorite_id =filtter("favorite_id");

    

deleteData("favorite", "favorite_id = $favorite_id" )


?>