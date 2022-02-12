<?php
session_start();
include_once 'header.php';
include_once 'databasehandler.php';
include_once 'function.php';
?>
<?php
if(isset($_GET["error"])){
    if($_GET["error"] == "none"){?>
        <div class="error-message">
        <p>Your Detailes has been updated Sccessfuly</p>
        </div>
        
    <?php 
   
    }
}
    ?>
<?php
if (isset($_SESSION['cusid'])){
   $getcusdata = displayCustomerData($conn, $_SESSION['cusid']);
?>
<div class="cusDetails-wraper">
    <div class="cd-inner-wraper">
        <div class="cus-nav">
            <ul class="cus-nav-list">
                <li class="cus-nav-list-item" id="active"><a href=""> Account</a></li>
                <li class="cus-nav-list-item"><a href="orders.php">Orders</a></li>
                <li class="cus-nav-list-item"><a href="returnedorders.php">returns</a></li>

            </ul>
        </div>
        <div class="cusde-container">
       <h4>Your Detailes</h4>
       <ul class="cos-details-list">
            <li class="cus-details-item">
                <p class="detail">Name:</p>
                <p class="details"><?php echo $getcusdata['cusFname'];
                    echo " "; 
                    echo $getcusdata['cusLname']; ?></p>
            </li>
            <li class="cus-details-item">
                <p class="detail">Email:</p>
                <p class="details"><?php echo $getcusdata['cusEmail'];?></p>
            </li>
            <li class="cus-details-item">
                <p class="detail">Contact Number:</p>
                <p class="details"><?php echo $getcusdata['cusPhoneNum'];?></p>
            </li>
            <li class="cus-details-item">
                <p class="detail">Address:</p>
                <p class="details"><?php echo $getcusdata['cusAddress'];
                        echo "<br>";
                    echo $getcusdata['cusCity'];
                    echo "<br>";
                    echo $getcusdata['cusCountry'];
                    echo "<br>";
                    echo $getcusdata['cusPostCode'];?></p>
            </li>
        </ul>
        <button class="addtobasketbtn" type="submit" ><a href="editeCustomerDetailes.php"> Update yor Detailes ></a></button>
        </div>
    </div>
    <div class="delet-profile-cpntainer">
<!-- Button trigger modal -->
<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
  Launch static backdrop modal
</button>

<!-- Modal -->
<div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="staticBackdropLabel">Modal title</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        ...
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Understood</button>
      </div>
    </div>
  </div>
</div>
</div>
    <?php
} 

?>
    
</div>

<?php
include_once 'footer.php';
?>