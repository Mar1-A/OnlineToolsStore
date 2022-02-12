<?php
include_once "header.php";
?>
<div class="signup-wraper">
	<div class="form-gray">
		<div class="form-custom">
			<div  class="form-content">
				<h1>Sign Up</h1>
				<h6>Already have an Account <a href="login.php">logIn</a></h6>
				<form class="signup-form" action="signupAction.php" method="post">
					<div class="form-top">
						<div class="user-name-wraper">
							<p class="label">your first name <strong>*</strong></p>
							<input class="name" type="text" name="fname"  placeholder="Ex..John" required>
						</div>
						<div class="user-name-wraper">
							<p class="label">your last name <strong>*</strong></p>
							<input class="name" type="text" name="lname" placeholder="Ex..Smith"  required>
						</div>
					</div>
					<div class="form-midle">
						<div class="email-ph-wraper">
							<p class="label">your email address <strong>*</strong></p>
							<input class="email" type="email"  name="email"  placeholder="Example@gmail.com" required autocomplete>
						</div>
						<div class="email-ph-wraper">
							<p class="label">confirm email address <strong>*</strong></p>
							<input class="email" type="email" name="confEmail"  placeholder="Example@gmail.com" required autocomplete>
						</div>
						<div class="email-ph-wraper">
							<p class="label">your Phone Number<strong>*</strong></p>
							<input id="subject" class="name" name="phoneNum"  type="text">
						</div>
					</div>
					<div class="form-top">
						<div class="user-name-wraper">
							<p class="label">Creat Password <strong>*</strong></p>
							<input class="name" type="password" name="passwd" required>
						</div>
						<div class="user-name-wraper">
							<p class="label">Confirm Password<strong>*</strong></p>
							<input class="name" type="password" name="repasswd" required>
						</div>
					</div>
					<div class="form-BTTs">
						<input class="form-BTT" type="submit" name="submit" value="Sign Up">
					</div>
				</form>
			</div>
		</div>
	</div>
</div>
<?php
	echo '<div class = "errormsg">';
	if(isset($_GET["error"])){
		if($_GET["error"] == "emaildontmatch"){
			echo "<p>Email does not match, chick your email!</p>";
		}
		if($_GET["error"] == "passwddontmatch"){
			echo "<p>Passwords do not match, Type your password Again!</p>";
		}
		if($_GET["error"] == "emailalredyexists"){
			echo '<p>You already have an account, try to <a href="login.php">login</a></p>';
		}
		if($_GET["error"] == "none"){
			echo '<p>You have signedup</p>';
		}

	}
	echo '</div>';
?>	
<?php
include_once "footer.php";
?>