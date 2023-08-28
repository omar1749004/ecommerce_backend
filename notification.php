<?php

include "connect.php" ;
$userid =filtter("id");

getAllData("notification","notification_userid  = '$userid' ORDER BY notification_userid DESC");

?>