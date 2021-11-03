<!DOCTYPE html>
<html lang="en">

<head>
	<title>Login V19</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!--===============================================================================================-->
	<link rel="icon" type="image/png" href="images/icons/favicon.ico" />
	<!--===============================================================================================-->

	<link rel="stylesheet" type="text/css" href="css/util.css">
	<link rel="stylesheet" type="text/css" href="css/main.css">
	<!--===============================================================================================-->
</head>

<body>

	<div class="limiter">
		<div class="container-login100">
			<div class="wrap-login100 p-l-55 p-r-55 p-t-65 p-b-50">
				<form class="login100-form validate-form" method="POST" action="index.php">
					<span class="login100-form-title p-b-33">
						Account Login
					</span>

					<div class="wrap-input100 validate-input" data-validate="Valid email is required: ex@abc.xyz">
						<input class="input100" type="text" name="email" placeholder="Email" required>
						<span class="focus-input100-1"></span>
						<span class="focus-input100-2"></span>
					</div>

					<div class="wrap-input100 rs1 validate-input" data-validate="Password is required">
						<input class="input100" type="password" name="password" placeholder="Password" required>
						<span class="focus-input100-1"></span>
						<span class="focus-input100-2"></span>
					</div>

					<div class="container-login100-form-btn m-t-20">
						<input type="submit" value="Sign in" name="login" class="login100-form-btn">
						</input>
					</div>

					<div class="text-center p-t-45 p-b-4">

						<div class="remember">

							<input type="checkbox" name="remember" value="1">

							<label>Remember login</label>

						</div>
						<?php
						if (isset($alert)) {
							echo $alert;
						}
						?>

					</div>


				</form>
			</div>
		</div>
	</div>

	<script src="js/main.js"></script>

</body>

</html>
