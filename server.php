<?php
session_name('login');
session_start();

$dbhost = "localhost";
$dbuser = "root";
$dbpass = "";
$dbname = "db_lr_sys";

// connect to the database
$db = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname);

$username = "";
$email = "";
$errors = array();

// if the register button is clicked
if (isset($_POST['reg_user'])) {
    $username   = $_POST['username'];
    $email      = $_POST['email'];
    $password_1 = $_POST['password_1'];
    $password_2 = $_POST['password_2'];

    // ensure that form fields are filled properly
    if (empty($username)){
        array_push($errors, "Username is required!"); // add error to errors array
    }
    if (empty($email)){
        array_push($errors, "Email is required!");
    }
    if (empty($password_1)){
        array_push($errors, "Password is required!");
    }
    if ($password_1 != $password_2){
        array_push($errors, "The two passwords do not match!");
    }
    if ($db->connect_error){
        die("Connection failed: " . $db->connect_error);
    }

    // if there are no errors, save user data to database
    if (count($errors) == 0){
        $password = md5($password_1); // encrypt password before storing in database (security)

        $sql = "INSERT INTO tbl_users(username, email, password) VALUES ('$username','$email','$password')";

        if (mysqli_query($db, $sql)){
            $_SESSION['login'] = true;
            $_SESSION['username'] = $username;
            $_SESSION['success'] = "You are now logged in";
            if (isset($_SESSION['login'])){
                header("Location: index.php"); // redirect to home page
            }

        }else{
            echo "Error: " . $sql . '<br>' . mysqli_error($db);
        }
    }
}

// log in user
if (isset($_POST['login'])){
    $username = $_POST['username'];
    $password = $_POST['password'];

    // ensure that form fields are filled properly
    if (empty($username)){
        array_push($errors, "Username is required!");
    }
    if (empty($password)){
        array_push($errors, "Password is required!");
    }

    if (count($errors) == 0){
        $password = md5($password); // encrypt password before comparing with that from database
        $sql = "SELECT * FROM tbl_users WHERE username='$username' AND password='$password'";
        $result = mysqli_query($db, $sql);
        if (mysqli_num_rows($result) == 1){
            // logged in
            $_SESSION['login'] = true;
            $_SESSION['username'] = $username;
            $_SESSION['success'] = "You are logged in";
            if (isset($_SESSION['login'])){
                header("Location: index.php"); // redirect to home page
            }
        }else{
            array_push($errors, "Wrong username/password combination!");
        }
    }
}

?>
