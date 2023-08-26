<?php

include "../connect.php" ;
$search =filtter("search");

getAllData("itemsview", "item_name LIKE '%$search%' OR  item_name_ar LIKE '%$search%'")





?>