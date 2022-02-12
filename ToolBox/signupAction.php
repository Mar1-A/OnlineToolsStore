<?php
require_once 'databasehandler.php';
require_once 'function.php';
if (isset($_POST["submit"])){
    $fname = $_POST["fname"];
    $lname = $_POST["lname"];
    $email= $_POST["email"];
    $emailRe = $_POST["confEmail"];
    $phoneNum = $_POST["phoneNum"];
    $password = $_POST["passwd"];
    $passwordRe = $_POST["repasswd"];

    if (emailMatch($email, $emailRe) !== false){
        header("Location: signup.php?error=emaildontmatch");
        exit();
    }
    if (passwdMatch($password, $passwordRe) !== false){
        header("Location: signup.php?error=passwddontmatch");
        exit();
    }

    if (emailExist($conn, $email) !== false){
        header("Location: signup.php?error=emailalredyexists");
        exit();
    }

    addCustomer($conn, $fname, $lname, $email, $password, $phoneNum);


}
else {
    header("Location: signup.php");
    exit();
}