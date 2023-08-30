<?php
include "connect.php" ;

$allData =array()   ;
$allData['status'] ="success";
$categories =  getAllData("categories",null,null,false)  ;

$allData['categories'] =$categories;


$items =  getAllData("itemTopSellingview","1=1 ORDER BY countItem DESC",null,false)  ;
if($items["status"] =="failure")
{
    getAllData("itemsview","item_descound != 0",null,false)  ;
}
$allData['items'] =$items;
echo json_encode($allData);
?>