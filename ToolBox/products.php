<?php
session_start();
    include_once "databasehandler.php";
    include_once "header.php"
?>

<div class="cards-gray">
  <div class="card-custom">
    <h4>All Tools</h4>
        <ul class="cards-list">
    <?php
        $sql = "SELECT * FROM products AS P LEFT JOIN prodbrand AS B ON P.brandID = B.brandID;";
        $result = mysqli_query($conn, $sql);
    
        if(mysqli_num_rows($result) > 0){
            while ($row = mysqli_fetch_assoc($result)){
    ?>
        
          
        <li class="card-item" style="
            float:left;">
          <form method="post" action="basket.php?id=<?php echo $row['prodID']?>"> 
            <div class="card-body">
              <a href="product.php?id=<?php echo $row['prodID'];?>" class="card-deta">
                <div class="card-inner">
                  <div class="card-img">
                    <img class="img-responsive" src="<?php echo $row['prodImg'];?>" width="250" alt="Card image cap">
                  </div>
                  
                  <h6 class="card-titel"><?php echo $row['prodName'];?></h6>
                  <p class="card-brand"><?php echo $row['brandaName'];?></p>
                  <p class="card-price">£<?php echo $row['prodPrice'];?></p>
                  </a>
                </div>
                  <input type="number" class="quantity-input" name="quantity" value="1"  min="1" max="<?=$row['prodQuintity']?>" placeholder="Quantity" required>
                  <input type="hidden" name="name" value="<?php echo $row['prodName'];?>">
                  <input type="hidden" name="description" value="<?php echo $row['prodDescription'];?>">
                  <input type="hidden" name="price" value="<?php echo $row['prodPrice'];?>">
                  <input type="submit" class="addtobasketbtn" name="addToBasket" value="Add to Cart">
            </div>
          </form>            
        </li>
          
        
    <?php
            }
        } else {

    ?>
    <p>No products to display!!</p>
    <?php
        }
    ?>
      </ul>  
    
  </div>
</div>
<br style ="clear:both;">
<?php
    include_once "footer.php"
?>