<?php
session_start();
error_reporting(E_ALL);
include_once 'header.php';
include_once "databasehandler.php";
include_once "function.php";

// if(!isset($_SESSION["cusid"]) && empty($_SESSION["cusid"]) ){
//     header('location:login.php');
//    }
// $total = 0;
// if(isset($_SESSION['shopping_cart'])){
//     foreach($_SESSION['shopping_cart'] as $key => $row){
//         $id = $row['id'];
//         $sql_cart = "SELECT * FROM products where prodID = $id";
// 	    $result_cart = mysqli_query($conn, $sql_cart);
//         if(mysqli_num_rows($result_cart) > 0){
//             $roww = mysqli_fetch_assoc($result_cart);
//             $total = $total +  ($roww['prodPrice'] * $row['quantity']);
//         }
	
//     }
// }
//     if (filter_input(INPUT_POST, 'placeorder')) {
//         $cusID = filter_input(INPUT_POST, 'cusID');
//         $prodID = filter_input(INPUT_POST, 'prodID');
//         $fname = filter_input(INPUT_POST, 'fname');
//         $lname = filter_input(INPUT_POST, 'lname');
//         $address = filter_input(INPUT_POST, 'address');
//         $city = filter_input(INPUT_POST, 'city');
//         $country = filter_input(INPUT_POST, 'country');
//         $postcode = filter_input(INPUT_POST, 'poatcode');
//         $total = 0;
//         if(isset($_SESSION['shopping_cart'])){
//             foreach($_SESSION['shopping_cart'] as $key => $value){
//                 //echo $key ." : ". $value['quantity'] . "<br>";
//                 $id = $value['id'];
//                 $sql_cart = "SELECT * FROM products where prodID = $id";
//                 $result_cart = mysqli_query($conn, $sql_cart);
//                 if(mysqli_num_rows($result_cart) > 0){
//                     $roww = mysqli_fetch_assoc($result_cart);
//                     $total = $total +  ($roww['prodPrice'] * $value['quantity']);
//                 }
//              }
//         }
    
    
//         // echo 'order table and order items - updated';
    
//         $insertOrder = "INSERT INTO orders (orderedBy, shipedtoFName, shipedtoLName, shipedtoAddress, shipedtoCity, shipedtoCountry, shipedtoPC, orderAmount, statuID) VALUES ($cusID, $fname, $lname, $address, $city, $country, $postcode,  $total, 1);";  
    
//         if(mysqli_query($conn, $insertOrder)){
         
//             $orderid = mysqli_insert_id($conn); 
//             foreach($_SESSION['shopping_cart'] as $key => $value){ 
                
//                 $sql_cart = "SELECT * FROM products where prodID = $id";
//                 $result_cart = mysqli_query($conn, $sql_cart);
//                 $row_cart = mysqli_fetch_assoc($result_cart); 
//                 $q  = $value["quantity"];
//                 $id = $value['id'];
//                 $insertordersItems = "INSERT INTO ordersitems (orderID, prodID, quantity) VALUES ('$orderid', '$id', '$q')";
               
//                if(mysqli_query($conn, $insertordersItems)){
//                     //echo 'inserted on both table orders and ordersItems';
//                     unset($_SESSION['shopping_cart']);
//                     // header("location:myaccount.php");
//                     header("Location: basket.php?error=couldnotplaceorder");
//                     exit();
    
            
//                }
    
    
//            }
    
        
    
//         }
//     }else {
//         header("Location: index.php");
//         exit();
//     }
// pre_r($_SESSION['shopping_cart']);
// $total = 0;
// if(isset($_SESSION['shopping_cart'])){
//     foreach($_SESSION['shopping_cart'] as $key => $row){
//         $id = $row['id'];
//         $sql_cart = "SELECT * FROM products where prodID = $id";
// 	    $result_cart = mysqli_query($conn, $sql_cart);
//         if(mysqli_num_rows($result_cart) > 0){
//             $roww = mysqli_fetch_assoc($result_cart);
//             $total = $total +  ($roww['prodPrice'] * $row['quantity']);
//         }
	
//     }
// }
// if (isset($_POST["placeorder"])) {
//     $cusID = $_SESSION["cusid"];
//     //$prodID = $_POST["prodID"];
//     $fname = $_POST["fname"];
//     $lname = $_POST["lname"];
//     $address = $_POST["address"];
//     $city = $_POST["city"];
//     $country = $_POST["country"];
//     $postcode = $_POST["postcode"];

    
//     if(placeorder($conn, $cusID, $fname, $lname, $address, $city, $country, $postcode, $total)){
//         $orderid = mysqli_insert_id($conn);
//         echo $orderid;
//         foreach($_SESSION['shopping_cart'] as $key => $value){ 
//             // $q  = $value["quantity"];
//             // $id = $value["id"];
//             insertorderitems($conn, $orderid, $value["id"], $value["quantity"]);
//             echo $value;
//         }
        
//     } else {
//         //    header("Location: login.php?error=couldnotplaceorder");
//         //     exit();
//         }
// }
?>

<div class="place-order-form-wrapper">
    <div class="order-summery">
    <?php 
                include_once 'ordersummery.php';?>
    </div>
<form action="placeorder.php" method="post">
    <div class="row">
        <div class="col-md-12">
            <div class="row">
                <div class="col-md-6">
                    <h3>Reciver Details</h3>
                    <hr>
                    <div class="form-group">
                        <label for="name">First Name</label>
                        <input type="name" name="fname" id="name" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="lname">Last Name</label>
                        <input type="text" name="lname" id="email" class="form-control">
                    </div>
                </div>
                <div class="col-md-6">
                    <h3>Shipping address</h3>
                    <hr>
                    <div class="form-group">
                        <label for="address">Address line 1</label>
                        <input type="address" name="address" id="address" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="city">City</label>
                        <input type="city" name="city" id="city" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="country">Country</label>
                        <input type="country" name="country" id="country" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="postcode">Postcode</label>
                        <input type="postcode" name="postcode" id="postcode" class="form-control">
                    </div>
                </div>
            </div>
        </div>
        <div class="">
            <div class="">
                <h4>Your order</h4>
                <hr>
            </div>
            <div class="well-dtn">
                <!-- <input type="hidden" name="cusID" value="<?php //echo $_SESSION['cusid']?>"> -->
                <!-- <input type="hidden" name="prodID" value="<?php //echo $row['id']?>"> -->
                <input type="hidden" name="quantity" value="<?php echo $row['quantity'];?>">     
                <input type="hidden" name="amount" value="<?php echo number_format($row['quantity'] * $row['price'], 2);?>">      
                
            </div>
        </div>
        <div class="placeorder-btn-gray">
        <button type="submit" name="placeorder" class="btn btn-warning">Place order</button>
        </div>
    </div>
    
</form>
</div>

<?php
include_once 'header.php';
?>