<?php
session_start();
require_once "db.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST['email'];
    $password = md5($_POST['password']);

    $result = mysqli_query($conn, "SELECT * FROM users WHERE email='$email' AND password='$password'");

    if (mysqli_num_rows($result) == 1) {
        $user = mysqli_fetch_assoc($result);

        $_SESSION['user'] = $user['name'];
        $_SESSION['role'] = $user['role'];

        header("Location: index.php");
    } else {
        echo "Invalid Login";
    }
}
?>

<link rel="stylesheet" href="style.css">

<div class="container">
<div class="card">
<h1>User Login</h1>

<form method="POST">
<input type="email" name="email" placeholder="Email" required>
<input type="password" name="password" placeholder="Password" required>

<button type="submit">Login</button>
</form>

<a href="register.php">Create account</a>
</div>
</div>