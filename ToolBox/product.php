<?php 
session_start();
include_once "header.php";
?>

<?php   

include_once "databasehandler.php";

if(isset($_GET['id'])){
    $product_id = $_GET['id'];
    $sql = "SELECT * FROM products AS P LEFT JOIN prodbrand AS B ON P.brandID = B.brandID JOIN category AS C ON P.catID = C.catID  WHERE prodID = $product_id";
    $result = mysqli_query($conn, $sql);
    if(mysqli_num_rows($result) > 0){
        $row = mysqli_fetch_assoc($result);
?>
<title><?=$row['prodName']?></title>
<div class="product-gray">
    <div class="product-custome">
        <form method="post" action="basket.php?id=<?php echo $row['prodID']?>">
            <div class="img-contaoner">
                <img class = "card-img" src="<?=$row['prodImg']?>" alt="<?=$row['prodName']?>">
            </div>
            
                <h2 class=""><?=$row['prodName']?></h2>
                <small >Serial Number: <?=$row['prodSNum']?></small>
                <div class="price-container">
                <span class="price">
                    £<?=$row['prodPrice']?>
                </span>
                </div>
                <div class="detailes-container">
                <input type="number" class="quantity-input" name="quantity" value="1"  min="1" max="<?=$row['prodQuintity']?>" placeholder="Quantity" required>
                <input type="hidden" name="name" value="<?php echo $row['prodName'];?>">
                <input type="hidden" name="description" value="<?php echo $row['prodDescription'];?>">
                <input type="hidden" name="price" value="<?php echo $row['prodPrice'];?>">
                <input type="submit" class="btn btn-primary" name="addToBasket" value="Add to Cart" style="width:100%; font-size:1em">
            </div>
        </form>
        <div class="info-wrapper">
        <p><bold style="font-weight:500;" >Brand:</bold> <?=$row['brandaName']?></p>
        <p><bold style="font-weight:500;">Tool Category: </bold><?=$row['catName']?></p>
        </div>
        <div class="description">
            <bold style="font-weight:500;">Description</bold>
                    <p style="
                    padding:7px; text-align:center; margin-top:5px;"><?=$row['prodDescription']?></p>
                </div>
    </div>
</div>
<?php
        }
    } else {

?>
<p>Product Does Not Exist!!</p>
<?php
    }

    mysqli_close($conn);
?>
<?php
    include_once "footer.php"
?>
