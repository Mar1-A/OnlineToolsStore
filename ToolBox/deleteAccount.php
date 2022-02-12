<?php
session_start();
include_once 'databasehandler.php';
include_once 'function.php';

if (isset($_SESSION['cusid'])) {
    if (filter_INPUT(INPUT_GET, 'action') == 'delete') {
        $cusid = $_SESSION['cusid'];
        deleteAccount($conn, $cusid);
    }
}