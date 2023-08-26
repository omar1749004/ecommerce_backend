<?php
include "../connect.php" ;

$userid =filtter("userid");
$data = getAllData("cartview", "cart_userid = '$userid'" ,null,false);
$stmt = $connect->prepare("SELECT SUM(itemprice) as totalprice , SUM(itemcount) as totalcount FROM `cartview` 
WHERE cart_userid = '$userid'
GROUP BY cart_userid");
$stmt->execute();

$dataCountPrice = $stmt->fetch(PDO::FETCH_ASSOC);

echo json_encode(array(
     "all" => $data ,
     "countprice" => $dataCountPrice

));
?>
