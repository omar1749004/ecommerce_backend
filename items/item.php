<?php

include "../connect.php" ;
$categoriesId =filtter("id");
// getAllData("itemview", "categories_id =$categoriesId")  ;
$userid = filtter("userid");
$stmt  =$connect->prepare("SELECT itemsview.*, 1 as favorite , (item_price - (item_price * item_descound / 100)) as item_PriceDiscound FROM itemsview
INNER JOIN favorite ON favorite.favorite_itemid=itemsview.item_id AND favorite.favorite_usersid = $userid
WHERE categories_id =$categoriesId
UNION ALL SELECT *, 0 as favorite , (item_price -(item_price * item_descound / 100)) as item_PriceDiscound  FROM itemsview
WHERE categories_id =$categoriesId AND  item_id NOT IN (SELECT itemsview.item_id FROM itemsview
INNER JOIN favorite ON favorite.favorite_itemid=itemsview.item_id AND favorite.favorite_usersid = $userid)");
 $stmt->execute();
 $data = $stmt->fetchAll(PDO::FETCH_ASSOC);
 $count  = $stmt->rowCount();
 if ($count > 0){
    echo json_encode(array("status" => "success", "data" => $data));
} else {
    echo json_encode(array("status" => "failure"));
}

?>