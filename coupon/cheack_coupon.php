<?php

include "../connect.php" ;

$couponName =filtter("couponName");
$now = date("Y-m-d H:i:s");
getData("coupon", "coupon_name ='$couponName' AND coupon_expiredate > '$now' AND coupon_count > 0");
?>