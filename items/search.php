<?php

include "../connect.php" ;
$search =filtter("search");
$stmt =$connect->prepare(
    "SELECT * ,(item_price - (item_price * item_descound / 100)) as item_PriceDiscound FROM itemsview WHERE item_name LIKE '%$search%' OR  item_name_ar LIKE '%$search%'");
$stmt->execute();
$data = $stmt->fetchAll(PDO::FETCH_ASSOC);
 $count  = $stmt->rowCount();
 if ($count > 0){
    echo json_encode(array("status" => "success", "data" => $data));
} else {
    echo json_encode(array("status" => "failure"));
}






?>