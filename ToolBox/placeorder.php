<?php
include_once "databasehandler.php";
include_once "function.php";
session_start();

$total = 0;
if(isset($_SESSION['shopping_cart'])){
    foreach($_SESSION['shopping_cart'] as $key => $row){
        $id = $row['id'];
        $sql_cart = "SELECT * FROM products where prodID = $id";
	    $result_cart = mysqli_query($conn, $sql_cart);
        if(mysqli_num_rows($result_cart) > 0){
            $roww = mysqli_fetch_assoc($result_cart);
            $total = $total +  ($roww['prodPrice'] * $row['quantity']);
        }
	
    }
}
    if (isset($_POST["placeorder"])) {
        $cusID = $_SESSION["cusid"];
        //$prodID = $_POST["prodID"];
        $fname = $_POST["fname"];
        $lname = $_POST["lname"];
        $address = $_POST["address"];
        $city = $_POST["city"];
        $country = $_POST["country"];
        $postcode = $_POST["postcode"];
    
        
        if(placeorder($conn, $cusID, $fname, $lname, $address, $city, $country, $postcode, $total) === true){
            $orderid = mysqli_insert_id($conn);
            foreach($_SESSION['shopping_cart'] as $key => $value){ 
                $q  = $value["quantity"];
                $id = $value["id"];
                insertorderitems($conn, $orderid, $id, $q);
            }
            header("Location:basket.php?error=orderplaces");
            exit;
    
        } else {
               header("Location: login.php?error=couldnotplaceorder");
                exit();
            }
    }
