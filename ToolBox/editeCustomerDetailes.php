<?php
session_start();
include_once 'header.php';
include_once 'databasehandler.php';
include_once 'function.php';
?>
<div class="update-wraper">
	<div class="form-gray">
		<div class="form-custom">
			<div  class="form-conten">
				<h4>Update Your Detailes</h4>
                <?php
                    if (isset($_SESSION['cusid'])){
                        $getcusdata = displayCustomerData($conn, $_SESSION['cusid']);
                ?>
				<form class="update-form" action="update.php" method="post">
					<div class="form-top">
						<div class="user-name-wraper">
                        <p class="label1">First Name:</p>
							<input class="update-filed" type="text" name="firstName" value="<?php echo $getcusdata['cusFname'];?>">
						</div>
						<div class="user-name-wraper">
                        <p class="label1">Last Name:</p>
							<input class="update-filed" type="text" name="lastName" value="<?php echo $getcusdata['cusLname'];?>">
						</div>
					</div>
					<div class="form-midle">
						<div class="email-ph-wraper">
                        <p class="label1">Email:</p>
							<input class="update-filed" type="email"  name="email" value="<?php echo $getcusdata['cusEmail'];?>">
						</div>
						
						<div class="email-ph-wraper">
                            <p class="label1">Phone Number:</p>
							<input class="update-filed" name="phoneNum"  type="text" value="<?php echo $getcusdata['cusPhoneNum'];?>">
						</div>
                        <div class="email-ph-wraper">
                            <p class="label1">First Line of Address:</p>
							<input class="update-filed" name="address"  type="text" value="<?php echo $getcusdata['cusAddress'];?>">
						</div>
                        <div class="email-ph-wraper">
                            <p class="label1">City:</p>
							<input class="update-filed" name="city"  type="text" value="<?php echo $getcusdata['cusCity'];?>">
						</div>
                        <div class="email-ph-wraper">
                            <p class="label1">Country:</p>
							<input class="update-filed" name="country"  type="text" value="<?php echo $getcusdata['cusCountry'];?>">
						</div>
                        <div class="email-ph-wraper">
                            <p class="label1">Postcode:</p>
							<input class="update-filed" name="postCode"  type="text" value="<?php echo $getcusdata['cusPostCode'];?>">
						</div>
					</div>
					
					<div class="form-BTTs">
						<input class="form-BTT" type="submit" name="update" value="Update">
					</div>
				</form>
                <?php
                        }
                    ?>
			</div>
		</div>
	</div>
</div>

<?php
include_once 'footer.php';
?>