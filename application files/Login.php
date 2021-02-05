<!DOCTYPE html>
<html lang="en" dir="ltr">
	<head>
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<meta charset="utf-8">
		<title>login</title>
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.14.0/css/all.min.css">
		<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js" charset="utf-8"></script>
		<link rel="stylesheet" href="../css/Login.css">
	</head>
	<body>

		<!--form area start-->
		<div class="form">
			<!--signup form start-->
			<form class="signup-form" action="connect.php" method="POST">
				<i class="fas fa-user-plus"></i>

				<input class="user-input" type="text" name="username" placeholder="Username" required pattern"^[A-Za-z0-9]+">
				<input class="user-input" type="email" name="email_address" placeholder="Email Address" required pattern"^[A-Za-z0-9]+">
				<input class="user-input" type="password" name="user_pass" placeholder="Password" required pattern"^[A-Za-z0-9]+">
				<input class="btn-submit" type="submit" name="btn-submit" value="SIGN UP">
				<div class="options-02">
					<p>Already Registered? <a href="#">Sign In</a></p>
				</div>
			</form>
			<!--signup form end-->

			<!--login form start-->
			<form class="login-form" action="connect.php" method="POST">
				<i class="fas fa-user-circle"></i>
				<input class="user-input" type="text" name="username" placeholder="Username" required >
				<input class="user-input" type="password" name="user_pass" placeholder="Password" required>
				<div class="options-01">
					<label class="remember-me"><input type="checkbox" name="">Remember me</label>
					<a href="reset_password.php">Forgot your password?</a>
				</div>
				<input class="btn-submit" type="submit" name="btn-login" value="LOGIN" >
				<div class="options-02">
					<p>Not Registered? <a href="#">Create an Account</a></p>
				</div>
			</form>
			<!--login form end-->
				</div>
		<!--form area end-->

		<script type="text/javascript">
		$('.options-02 a').click(function(){
			$('form').animate({
				height: "toggle", opacity: "toggle"
			}, "slow");
		});
		</script>

	</body>
</html>
