<?php include "server.php";?>

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
		<h2>Register</h2>
	</div>
	<form action="register.php" method="post">

        <!--display validation errors here-->
        <?php include 'errors.php';?>

		<div class="input-group">
			<label for="Username">Username</label>
			<input type="text" name="username" >
		</div>
		<div class="input-group">
			<label for="Email">Email</label>
			<input type="text" name="email" >
		</div>
		<div class="input-group">
			<label for="Password">Password</label>
			<input type="password" name="password_1">
		</div>
		<div class="input-group">
			<label for="Confirm Password">Confirm Password</label>
			<input type="password" name="password_2">
		</div>
		<div class="input-group">
			<button type="submit" name="reg_user" class="btn">Register</button>
		</div>
		<p>Already a member? <a href="login.php">Sign in</a></p>
	</form>
</body>
</html>
