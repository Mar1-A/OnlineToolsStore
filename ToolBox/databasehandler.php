<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "toolboxdb";

// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);
// Check connection
if (!$conn = mysqli_connect($servername, $username, $password, $dbname)) {
    die("Connection failed! ");
}

