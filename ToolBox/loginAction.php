<?php
require_once 'databasehandler.php';
require_once 'function.php';

if (isset($_POST['submit'])){
    $cusemail = $_POST['cusemail'];
    $cuspasswd = $_POST['cusPasswd'];


    loginCustomer($conn, $cusemail, $cuspasswd);

}
else{
    header("Location: login.php");
    exit();
}