<?php
include_once "databasehandler.php";
include_once "function.php";
if(filter_input(INPUT_GET, 'action') == 'return'){
    $orderID = filter_input(INPUT_GET, 'orderid');
    returnorder($conn, $orderID);
}