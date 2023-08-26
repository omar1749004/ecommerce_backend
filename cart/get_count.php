<?php


include "../connect.php" ;

$userid =filtter("userid");
$itemid =filtter("itemid");


$stmt = $connect->prepare("SELECT COUNT(cart_id) AS countItems FROM `cart` WHERE cart_userid = $userid AND cart_itemsid =$itemid AND cart_orders = 0");
$stmt->execute();
$count =$stmt->rowCount();
$data =$stmt->fetchColumn();

if ($count > 0) {
    echo json_encode(array("status" => "success", "data" => $data));
} else {
    echo json_encode(array("status" => "failure", $data => 0));
}

?>