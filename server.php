<?php
session_name("login");
session_start();

$dbhost = "localhost";
$dbuser = "root";
$dbpass = "";
$dbname = "db_lr_sys";

$db = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname);
?>
