<?php include 'server.php';?>

<?php
// if user is logged in then redirect to home page
if (isset($_SESSION['login'])){
    header("Location: index.php");
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Login Registration System with PHP and MySQL</title>
	<link rel="stylesheet" href="style.css">
</head>
<body>
	<div class="header">
		<h2>Login</h2>
	</div>
	<form action="login.php" method="post">

        <!--display validation errors here-->
        <?php include 'errors.php';?>

		<div class="input-group">
			<label for="Username">Username</label>
			<input type="text" name="username">
		</div>
		
		<div class="input-group">
			<label for="Password">Password</label>
			<input type="password" name="password">
		</div>
		
		<div class="input-group">
			<button type="submit" name="login" class="btn">Login</button>
		</div>
		<p>
			Not a member? <a href="register.php">Sign up</a>
		</p>
	</form>
</body>
</html>
