<?php

include "../connect.php" ;

$usersid =filtter("userid");
$addressid =filtter("addressid");
$orderstype =filtter("orderstype");
$pricedelivery =filtter("pricedelivery");
$ordersPrice =filtter("ordersPrice");
$couponid =filtter("couponid");
$paymentmethod =filtter("paymentmethod");
$discoundCoupon =filtter("discoundCoupon");

if($orderstype == "1"){
  $pricedelivery =0 ;
}
$total = $ordersPrice +$pricedelivery;
//check copoun 

if($couponid != "0")
{
    
    $now = date("Y-m-d H:i:s");  // yyyy-MM-dd HH:mm:ss
    $checkcoupon = getData("coupon", "coupon_id  ='$couponid' AND coupon_expiredate > '$now' AND coupon_count > 0",null,false);
    if($checkcoupon > 0)
    {
        $total = ($ordersPrice - $ordersPrice * $discoundCoupon / 100) + $pricedelivery;
        $stmst =$connect->prepare("UPDATE `coupon` SET `coupon_count` = coupon_count - 1 where coupon_id  ='$couponid'");
        $stmst->execute();
    }
}




$data =array(
    "orders_usersid" => $usersid,
    "orders_address" => $addressid,
    "orders_type"    => $orderstype,
    "orders_pricedelivery" => $pricedelivery,
    "orders_price" => $ordersPrice,
    "orders_coupon" => $couponid,
    "orders_paymentmethod" => $paymentmethod,
    "orders_totalprice" => $total
);
$count = insertData("orders",$data,false);

if($count >0)
{
    $stmst =$connect->prepare("SELECT MAX(orders_id) FROM `orders`");
    $stmst->execute();
    $maxid =$stmst->fetchColumn() ;
    $data =array(
        "cart_orders" =>$maxid
    );
    updateData("cart" ,$data,"cart_userid ='$usersid' AND cart_orders = 0");
}


?>