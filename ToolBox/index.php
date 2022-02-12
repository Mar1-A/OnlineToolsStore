<?php
session_start();
    include_once "databasehandler.php";
    include_once "function.php";
    include_once "header.php";

?>
<title>ToolBox</title>
<?php
if(isset($_GET["error"])){
  if($_GET["error"] == "tooladded"){
      echo "<p style='hight:20px; text-align:center; background:#d8a0fc; padding:10px; margin-bottom: -7px;'>Item Added to Basket</p>";
  }
}
?>
<div id="carouselExampleDark" class="carousel carousel-dark slide" data-bs-ride="carousel">
  <div class="carousel-indicators">
    <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
    <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="1" aria-label="Slide 2"></button>
    <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="2" aria-label="Slide 3"></button>
  </div>
  <div class="carousel-inner">
    <div class="carousel-item active" data-bs-interval="10000">
      <img src="img/slide333.png" class="d-block w-100" alt="...">
     
    </div>
    <div class="carousel-item" data-bs-interval="2000">
      <img src="img/slide111.jpg" class="d-block w-100" alt="...">
    </div>
    <div class="carousel-item">
      <img src="img/slide2.jpg" class="d-block w-100" hight="200px" alt="...">
    </div>
  </div>
  <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleDark" data-bs-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Previous</span>
  </button>
  <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleDark" data-bs-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Next</span>
  </button>
</div>
<div class="category-nav">
    
    <?php
    
    ?>

</div>
<div class="cards-gray">
  <div class="card-custom">
    <h4>recently added tools</h4>
        <ul class="cards-list">
    <?php
        $sql = "SELECT * FROM products AS P LEFT JOIN prodbrand AS B ON P.brandID = B.brandID LEFt JOIN category AS C ON P.catID = C.catID ORDER BY P.dateAdded DESC;";
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
                  <p class="card-brand"><?php echo $row['catName'];?></p>
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
<div class="shop-by-catag-wrapper" style="clear:left;">
  <div class="shop-by-inner-wrappwr">
  <h4>Shop By Tool Category</h4>
  
    <ul class="cat-nav-list">
    <?php 
    $sql = "SELECT * FROM category;";
    $result1 = mysqli_query($conn, $sql);
        if(mysqli_num_rows($result1) > 0){
            while ($catrow = mysqli_fetch_assoc($result1)){
    ?>
    <div class="category-item-wrapper">
      <li class="category-item">
        <a href="?action=showprod&catid=<?php echo $catrow['catID']?>"><?php echo $catrow['catName']?></a>
      </li>
    </div>
<?php    
        }
      } else {
        echo '<p>nothing to display</p>';
      }
        ?>
    </ul>
  </div>
</div>
<div class="cards-gray1">
  <div class="card-custom">
  <ul class="cards-list">
    <?php
       if(filter_input(INPUT_GET,'action') == 'showprod'){
        $catID = filter_input(INPUT_GET,'catid');
        $prodDetailes = displayproductbycate($conn, $catID);
    ?>
        <li class="card-item">
          <form method="post" action="basket.php?id=<?php echo $prodDetailes['prodID']?>"> 
            <div class="card-body">
              <a href="product.php?id=<?php echo $prodDetailes['prodID'];?>" class="card-deta">
                <div class="card-inner">
                  <div class="card-img">
                    <img class="img-responsive" src="<?php echo $prodDetailes['prodImg'];?>" width="250" alt="Card image cap">
                  </div>
                  
                  <h6 class="card-titel"><?php echo $prodDetailes['prodName'];?></h6>
                  <p class="card-details"><?php echo $prodDetailes['brandaName'];?></p>
                  <p class="card-details">£<?php echo $prodDetailes['prodPrice'];?></p>
                  </a>
                </div>
                  <input type="number" class="quantity-input" name="quantity" value="1"  min="1" placeholder="Quantity" required>
                  <input type="hidden" name="name" value="<?php echo $prodDetailes['prodName'];?>">
                  <input type="hidden" name="description" value="<?php echo $prodDetailes['prodDescription'];?>">
                  <input type="hidden" name="price" value="<?php echo $prodDetailes['prodPrice'];?>">
                  <input type="submit" class="addtobasketbtn" name="addToBasket" value="Add to Cart">
            </div>
          </form>            
        </li>  
    <?php          
        } 
    ?>
      </ul>
  </div>
</div>
<?php
    include_once "footer.php"
?>
