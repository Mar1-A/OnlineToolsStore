<table class="table">
    <tr>
        <th Width="33.333%">Product</th>
        <th Width="33.333%"> Quantity</th>
        <th Width="33.333%">Price</th>
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
        </tr>
    <?php 
        }
    $total = $total + ($row['quantity'] * $row['price']);
    ?>
    <tr>
        <td colspan="3" align="right">Total</td>
        <td align="right"><?php echo number_format($total, 2);?></td>
        <td></td>
    </tr>
    <?php
            }
    ?>