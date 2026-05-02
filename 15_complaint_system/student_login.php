<?php
session_start();
require "db.php";
?>

if(isset($_POST['login'])) {
    $user = $_POST['username'];
    $pass = $_POST['password'];

    $res = mysqli_query($conn, "SELECT * FROM students WHERE username='$user' AND password='$pass'");

    if(mysqli_num_rows($res) > 0) {
        $_SESSION['student'] = $user;
        header("Location: student_dashboard.php");
    } else {
        echo "Invalid Login";
    }
}
?>

<link rel="stylesheet" href="style.css">

<div class="container">
<h2>Student Login</h2>
<form method="POST">
<input type="text" name="username" placeholder="Username" required>
<input type="password" name="password" placeholder="Password" required>
<button name="login">Login</button>
</form>
<a href="student_register.php">New Student? Register</a>
<a href="admin_login.php">Admin Login</a>
</div>