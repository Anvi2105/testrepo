<?php
session_start();
include "db.php";

if(isset($_POST['login'])) {
    $user = $_POST['username'];
    $pass = $_POST['password'];

    $res = mysqli_query($conn, "SELECT * FROM admin WHERE username='$user' AND password='$pass'");

    if(mysqli_num_rows($res) > 0) {
        $_SESSION['admin'] = $user;
        header("Location: admin_dashboard.php");
    } else {
        echo "Invalid Admin Login";
    }
}
?>

<link rel="stylesheet" href="style.css">

<div class="container">
<h2>Admin Login</h2>
<form method="POST">
<input type="text" name="username" required>
<input type="password" name="password" required>
<button name="login">Login</button>
</form>
<a href="admin_register.php">New Admin? Register</a>
</div>