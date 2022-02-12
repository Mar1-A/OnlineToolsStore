<?php

function pre_r($array){
    echo '<pre>';
    print_r($array);
    echo '</pre>';
}

function emailMatch($email, $emailRe){
    $result = null;
    if ($email === $emailRe){
        $result = false;
    } 
    else {
        $result = true;
    }
    return $result;
}

function passwdMatch($password, $passwordRe){
    $result = null;
    if ($password === $passwordRe){
        $result = false;
    } 
    else {
        $result = true;
    }
    return $result;
}

/*check if the email entered when customer 
signs up alreadey exists in the database*/
function emailExist($conn, $email){
    $sql = "SELECT * FROM customers WHERE cusEmail = ?;";
    $stmt = mysqli_stmt_init($conn);
    /* if the emaile exists the customer will be 
    redirected to the log in page*/
    if(!mysqli_stmt_prepare($stmt, $sql)) {
        header("Location: signup.php?error = emailalredyexists");
        exit();
    }

    mysqli_stmt_bind_param($stmt, "s", $email);
    mysqli_stmt_execute($stmt);

    $dataResult = mysqli_stmt_get_result($stmt);

    if($row = mysqli_fetch_assoc($dataResult)){
        return $row;
    }
    else{
        $result = false;
        return $result;    
    }

    mysqli_stmt_close($stmt);
}
//adding customer data to the database when they sign up
function addCustomer($conn, $fname, $lname, $email, $password, $phoneNum ){
    //inserting values in the database 
    $sql = "INSERT INTO customers (cusFName, cusLName, cusEmail, cusPasswd, cusPhoneNum) VALUES (?, ?, ?, ?, ?);";
    $stmt = mysqli_stmt_init($conn);
    if(!mysqli_stmt_prepare($stmt, $sql)) {
        header("Location: signup.php?error=statment");
        exit();
    }

    mysqli_stmt_bind_param($stmt, "sssss", $fname, $lname, $email, $password, $phoneNum);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);
    header("Location: login.php?error=none");
        exit();
}

function loginCustomer($conn, $cusemail, $cuspasswd){
    $emailexist = emailExist($conn, $cusemail);
    //checks if entered email exists in the database
    if(!$emailexist === true){
        header("Location: login.php?error=emaildoesntexist");
        exit();
    }
    /*checks if the assoseated password 
    with the account match the password entered*/
    if ($cuspasswd === $emailexist["cusPasswd"]){
        session_start();
        $_SESSION["cusid"] = $emailexist['cusID'];
		$_SESSION["cusemail"] = $emailexist["cusEmail"];
        header("Location: index.php");
        exit();
    } else{
        header("Location: login.php?error=wrongpassword");
        die;
    }
}

function displayCustomerData($conn, $cusID){
    $sql = "SELECT * FROM customers WHERE cusID = $cusID;";
    $result = mysqli_query($conn, $sql);
    if(mysqli_num_rows($result) > 0){
        $cusDetailes = array();
        while($row = mysqli_fetch_assoc($result)){
            $cusDetailes['cusID'] = $row['cusID'];
            $cusDetailes['cusFname'] = $row['cusFName'];
            $cusDetailes['cusLname'] = $row['cusLName'];
            $cusDetailes['cusEmail'] = $row['cusEmail'];
            $cusDetailes['cusAddress'] = $row['cusAddress'];
            $cusDetailes['cusCity'] = $row['cusCity'];
            $cusDetailes['cusCountry'] = $row['cusCountry'];
            $cusDetailes['cusPostCode'] = $row['cusPostCode'];
            $cusDetailes['cusPhoneNum'] = $row['cusPhoneNum'];
            $cusDetailes['dateJoined'] = $row['dateJoined'];

        }
        return $cusDetailes;
    }
    else {
        header("Location: index.php?error=nothingwherefound");
        die;
    }
}

function editeDetails($conn, $cusid, $firstName, $lastName, $email, $phoneNum, $address, $city, $country, $postCode){
    $sql="UPDATE customers SET cusFName = '$firstName', cusLName = '$lastName', cusEmail = '$email', cusPhoneNum = '$phoneNum', cusAddress ='$address', cusCity = '$city', cusCountry = '$country', cusPostCode = '$postCode' WHERE cusID = $cusid; ";
    $result = mysqli_query($conn, $sql);
    if ($result) {
        header('Location: customerAccount.php?error=none');
        exit();
    }
    else {
        header("Location: customerAccount.php?error=detailesnotupdated");
        exit();
    }

}

function deleteAccount($conn, $cusid){
    $sql = "DELETE FROM customers WHERE cusID = $cusid;";
    $result = mysqli_query($conn, $sql);
    if ($result == true) {
        session_unset();
        session_destroy();
        header('Location: index.php?error=accountdeleted');
        exit();
    }
    else {
        header("Location: customerAccount.php?error=unabletodelete");
        exit();
    }
}
function displayproductbycate($conn,$catID){
    $sql = "SELECT * FROM  category AS C inner JOIN products AS P ON  C.catID = P.catID  LEFT JOIN prodbrand AS B On P.brandID = B.brandID WHERE P.catID = $catID;";
    $result = mysqli_query($conn, $sql);
    if(mysqli_num_rows($result) > 0){
        $prodDetailes = array();
        while($row = mysqli_fetch_assoc($result)){
            $prodDetailes['prodID'] = $row['prodID'];
            $prodDetailes['prodName'] = $row['prodName'];
            $prodDetailes['prodDescription'] = $row['prodDescription'];
            $prodDetailes['prodPrice'] = $row['prodPrice'];
            $prodDetailes['brandaName'] = $row['brandaName'];
            $prodDetailes['prodImg'] = $row['prodImg'];
            $prodDetailes['prodSNum'] = $row['prodSNum'];
        }
        return $prodDetailes;
    } elseif(mysqli_num_rows($result) == 0){
        exit();
    }
}

Function placeorder($conn, $cusID, $fname, $lname, $address, $city, $country, $postcode, $amount ){
    $sql = "INSERT INTO orders (orderedBy, shipedtoFName, shipedtoLName, shipedtoAddress, shipedtoCity, shipedtoCountry, shipedtoPC, orderAmount, statuID) VALUES (?, ?, ?, ?, ?, ?, ?, ?, 1);";
    $stmt = mysqli_stmt_init($conn);
    if(!mysqli_stmt_prepare($stmt, $sql)) {
        header("Location: signup.php?error=statment");
        exit();
    }
    mysqli_stmt_bind_param($stmt, "issssssd", $cusID, $fname, $lname, $address, $city, $country, $postcode, $amount);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);
    header("Location: basket.php?error=orderplaces");
    die;
}

Function insertorderitems($conn, $orderID, $prodID, $quantity){
    $sql = "INSERT INTO orderitems (orderID, prodID, quantity) VALUES (?, ?, ?);";
    $stmt = mysqli_stmt_init($conn);
    if(!mysqli_stmt_prepare($stmt, $sql)) {
        header("Location: checkout.php?error=statment");
        exit();
    }
    mysqli_stmt_bind_param($stmt, "sss", $orderID, $prodID, $quantity);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);
    header("Location: basket.php?error=couldnotplaceorder");
    exit();
}
// Function quantityupdate($conn, $prodID, $quantity){
//     $sql = "UPDATE products SET prodQuintity = prodQuintity - $quantity WHERE prodID = $prodID;";
//     $result = mysqli_query($conn, $sql) or die ( mysqli_error($conn));
// }
function returnorder($conn, $orderid){
    $sql = "UPDATE orders SET statuID = 3 WHERE orderID = $orderid;";
    $result = mysqli_query($conn, $sql);
    if ($result) {
        header('Location: orders.php?error=orderreturned');
        exit();
    }
    else {
        header("Location: orders.php?error=detailesnotupdated");
        exit();
    }
}

function getproducto($conn, $prodID){
    $sql = "SELECT * FROM products where prodID = $prodID";
    $result = mysqli_query($conn, $sql);
    if(mysqli_num_rows($result) > 0){
        $row = mysqli_fetch_assoc($result);
    }
}