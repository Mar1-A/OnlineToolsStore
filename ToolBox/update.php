<?php
session_start();
include_once 'databasehandler.php';
include_once 'function.php';

if (isset($_SESSION['cusid'])) {

    if (isset($_POST['update'])) {
        $firstName = $_POST['firstName'];
        $lastName = $_POST['lastName'];
        $email = $_POST['email'];
        $phoneNum = $_POST['phoneNum'];
        $address = $_POST['address'];
        $city = $_POST['city'];
        $country = $_POST['country'];
        $postCode = $_POST['postCode'];

        editeDetails($conn, $_SESSION['cusid'], $firstName, $lastName, $email, $phoneNum, $address, $city, $country, $postCode);
    }
}
else {
    header("Location: customerAccount.php");
    exit();
}