<?php

$to  ="omar@gmail.com";
 $title ="hi";
 $body ="I am omar";
 $header = "From: support@omar.com" . "\n" ."CC: omar@gmail.com";
mail($to,$title,$body,$header);

?>