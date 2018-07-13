<?php
session_name('login');
session_start();

// if the user is not logged in then redirect to login page
if (isset($_SESSION['login']) == false){
    header("Location: login.php");
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
    <h2>Home page</h2>
</div>
<div class="content">
    <?php if (isset($_SESSION['success'])):?>
        <div class="success">
            <h3>
                <?php
                echo $_SESSION['success'];
                unset($_SESSION['success']);
                ?>
            </h3>
        </div>
    <?php endif ?>

    <?php if (isset($_SESSION['username'])):?>
        <p>Welcome <strong><?php echo $_SESSION['username'];?></strong></p>
        <p><a href="logout.php">Logout</a></p>
    <?php endif?>
</div>
</body>
</html>
