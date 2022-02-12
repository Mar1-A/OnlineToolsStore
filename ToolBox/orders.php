<?php
session_start();
include_once 'header.php';
include_once 'databasehandler.php';
include_once 'function.php';
?>
<?php
if(isset($_GET["error"])){
    if($_GET["error"] == "orderreturned"){?>
        <div class="error-message">
        <p>Ship your Order Back to us!!</p>
        </div>
        
    <?php 
   
    }
}
    ?>

<div class="">
    <div class="">
        <div class="order-list-nav">
            <ul class="cus-nav-list">
                <li class="cus-nav-list-item"><a href="customerAccount.php"> Account</a></li>
                <li class="cus-nav-list-item" id="active"><a href="">Orders</a></li>
                <li class="cus-nav-list-item"><a href="returnedorders.php">returns</a></li>

            </ul>
        </div>
        <div class="ousde-container">
       <div class="order-detailes-wrapper">
      <table class="table">
                <tr>
                    <tr><th colspan="4"><h3>Your orders</h3></th></tr>
                <th Width="20%">Total</th>
                    <th Width="25%">Product</th>
                    <th Width="25%"> your Detailes</th>
                    <th Width="25%">Shipping Details</th>
                    <th Width="5%"></th>
                    
                </tr>
       <?php
if (isset($_SESSION['cusid'])){
    $cusID = $_SESSION['cusid'];
    $sql = "SELECT * FROM  orders AS O JOIN customers AS C ON  O.orderedBy = C.cusID JOIN products AS P On O.orederedProdID = P.prodID
                                       JOIN orderstatues AS S ON O.statuID = S.statuID WHERE O.orderedBy = $cusID and S.statu != 'Returned' 
                                       ORDER BY orderDate DESC;";
    $result = mysqli_query($conn, $sql);
    if(mysqli_num_rows($result) > 0){
        while($orderDetailes = mysqli_fetch_assoc($result)){
?>
    <tr>
        <td>£
        prder Date: <?php echo $orderDetailes['orderDate'];?><br>
        order Total: £ <?php echo $orderDetailes['orderAmount'];?>
        </td>
                    <td><?php echo  $orderDetailes['prodName'];?>
                <br> <?php echo  $orderDetailes['prodPrice'];?>
                <br> <?php echo  $orderDetailes['orderQuantity'];?></td>
                    
                    <td><?php echo $orderDetailes['cusFName'];?> <?php echo $orderDetailes['cusLName'];?><br>
                        <?php echo $orderDetailes['cusEmail'];?><br>
                        <?php echo $orderDetailes['cusAddress'];?><br>
                        <?php echo $orderDetailes['cusCity'];?><br>
                        <?php echo $orderDetailes['cusCountry'];?><br>
                        <?php echo $orderDetailes['cusPostCode'];?><br>
                        <?php echo $orderDetailes['cusPhoneNum'];?></td>
                    
                        <td>
                        <?php echo $orderDetailes['shipedtoFName'] ;?> <?php echo $orderDetailes['shipedtoLName'];?><br>
                        <?php echo $orderDetailes['shipedtoAddress'];?><br>
                        <?php echo $orderDetailes['shipedtoCity'];?><br>
                        <?php echo $orderDetailes['shipedtoCountry'];?><br>
                        <?php echo $orderDetailes['shipedtoPC'];?>
                        
                        </td>
                
                
                    <td>
                        <a href="return.php?action=return&orderid=<?php echo $orderDetailes['orderID'];?>">Return</a>
                    </td>
                    </tr>
      
    <?php
        } 
    }
    else{
        echo '<p>No orders Yet</p>';
    }
}
?>
</table>
</div>
  </div>  
</div>
</div>

<?php
include_once 'footer.php';
?>