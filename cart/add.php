<?php

include "../connect.php" ;
$userid =filtter("userid");
$itemid =filtter("itemid");

//getData("cart" , "'cart_userid' = $userid AND 'cart_itemsid' = $itemid"); 

  

    $data =array(
        "cart_userid"  =>  $userid ,
        "cart_itemsid" => $itemid  
    );

     insertData("cart" , $data);

?>