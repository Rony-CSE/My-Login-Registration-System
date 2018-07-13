<?php
session_name('login');
session_start();

session_unset();
session_destroy();

// if user is not logged in then redirect to login page
if (isset($_SESSION['login']) == false){
    header("Location: login.php");
}
?>
