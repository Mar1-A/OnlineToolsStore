<?php
    session_start();
    $product_id = array();
    include_once "function.php";
    //session_destroy();

    if (filter_input(INPUT_POST, 'addToBasket')){
        //create the session variable for the basket
        if(isset($_SESSION['shopping_cart'])){
            $count = count($_SESSION['shopping_cart']);
            $product_id = array_column($_SESSION['shopping_cart'], 'id');
            // checks if the product is not in the basket it will add it 
            if(!in_array(filter_input(INPUT_GET, 'id'), $product_id)){
            $_SESSION['shopping_cart'][$count] = array
                (
                    'id' => filter_input(INPUT_GET, 'id'),
                    'name' => filter_input(INPUT_POST, 'name'),
                    'description' => filter_input(INPUT_POST, 'description'),
                    'price' => filter_input(INPUT_POST, 'price'),
                    'quantity' => filter_input(INPUT_POST, 'quantity')
                );
            } else {
                // if the Product exists in basket it will just update the quanity
                for ($i = 0; $i < count($product_id); $i++){
                    if($product_id[$i] == filter_input(INPUT_GET, 'id')){
                        $_SESSION['shopping_cart'][$i]['quantity'] += filter_input(INPUT_POST, 'quantity');
                    }
                }
            }
            
        } else {
        // There are no products in basket, this will add the first product to basket
        $_SESSION['shopping_cart'][0] = array
            (
                'id' => filter_input(INPUT_GET, 'id'),
                'name' => filter_input(INPUT_POST, 'name'),
                'description' => filter_input(INPUT_POST, 'description'),
                'price' => filter_input(INPUT_POST, 'price'),
                'quantity' => filter_input(INPUT_POST, 'quantity')
            );
           
        }
        header("location: index.php?error=tooladded");
        exit();
    }
   //Remove product from cart,by by filtering the product id.
    if(filter_INPUT(INPUT_GET, 'action') == 'delete'){
        foreach($_SESSION['shopping_cart'] as $key => $row){
            if($row['id'] == filter_INPUT(INPUT_GET, 'id')){
                // Remove the product from the shopping cart
                unset($_SESSION['shopping_cart'][$key]);

            }
        }

    }

    //pre_r($_SESSION);
  ?>


    <?php
include_once 'header.php';
include_once 'databasehandler.php';
?>
<title>Basket</title>
<br/>

<div class="alert alert-success">
<?php
if(isset($_GET["error"])){
    if($_GET["error"] == "orderplaces"){
        echo "<p>thankyou for your order</p>";
    }
}
?>

</div>
<div class="basket-gray">
    <div class="basket-custom">
        <div class="table-responsive">
            <table class="table">
                <tr><th colspan="4"><h3>Your Basket</h3></th></tr>
                <tr>
                    <th Width="30%">Product</th>
                    <th Width="15%"> Quantity</th>
                    <th Width="20%">Price</th>
                    <th Width="20%">Total</th>
                    <th Width="15%">Action</th>
                </tr>
                <?php
                if (!empty($_SESSION['shopping_cart'])){
                    $total = 0;
                    foreach($_SESSION['shopping_cart'] as $key=>$row){
                ?>
                <tr>
                    <td><?php echo $row['name'];?></td>
                    <td><?php echo $row['quantity'];?></td>
                    <td><?php echo $row['price'];?></td>
                    <td><?php echo number_format($row['quantity'] * $row['price'], 2);?></td>
                    <td>
                        <a href="basket.php?action=delete&id=<?php echo $row['id']?>">
                            <div class="btn btn-warning">Remove</div>
                        </a>
                    </td>
                </tr>
                <?php
                    $total = $total + ($row['quantity'] * $row['price']);
                    }
                ?>
                <tr>
                    <td colspan="3" align="right">Total</td>
                    <td align="right"><?php echo number_format($total, 2);?></td>
                    <td></td>
                </tr>
                <tr>

                <td colspan="5" style="text-align:center;">
                    <?php 
                    //if a product is in the basket then the check out button will appeare 
                    if(isset($_SESSION['shopping_cart'])){
                        if(count($_SESSION['shopping_cart']) > 0){
                    ?>
                    <a href="checkout.php" class="checkout-button" style="margin: auto; background: #d8a0fc; padding:7px 20px; text-decoration:none; border: 1px solid #000;
    border-radius: 20px;
    box-shadow: 0.6px 0px 10px rgba(0, 0, 0, 0.5); ">Check out</a>
                    <?php
                        }
                        else {?>
                            <p>You have no products added in your Shopping Cart</p>
                        <?php }
                    } ?>
                </td>
                </tr>
                <?php    
                }?>
            </table>
        </div>
    </div>
</div>
<?php
    include_once "footer.php"
?>