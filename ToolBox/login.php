<?php
include_once "header.php";
?>
<div class="signup-wraper">
	<div class="form-gray">
		<div class="form-custom">
			<div  class="form-content">
				<h1>Login</h1>
				<h6>Don't have an Account <a href="signup.php">signup</a></h6>
				<form class="signup-form" action="loginAction.php" method="post">
					<div class="form-midle">
						<div class="email-ph-wraper">
							<p class="label">your email address <strong>*</strong></p>
							<input class="email" type="email"  name="cusemail"  placeholder="Example@gmail.com" required autocomplete>
                        </div>
                        <div class="email-ph-wraper">
							<p class="label">Password <strong>*</strong></p>
							<input class="name" type="password" name="cusPasswd" required>
						</div>
					</div>
					<div class="form-BTTs">
						<input class="form-BTT" type="submit" name="submit" value="login">
					</div>
				</form>
			</div>
		</div>
	</div>
</div>
<?php
    echo '<div class = "errormsg">';
        if(isset($_GET["error"])){
            if($_GET["error"] == "emaildoesntexist"){
                echo '<p>Email does not Exist <a href="signup.php">signup</a></p>';
			}
            if($_GET["error"] == "wrongpassword"){
                echo "<p>Check your password and try again</p>";
            }
			if($_GET["error"] == "loginfirst"){
                echo "<p>Please log in or sign up first to make an order</p>";
            }
		}
    echo "</div>";
?>
<?php
include_once "footer.php";
?>