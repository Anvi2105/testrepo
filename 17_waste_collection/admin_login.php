<?php
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $password = $_POST['password'];

    if ($username == "admin" && $password == "admin123") {
        $_SESSION['admin'] = true;
        header("Location: admin.php");
    } else {
        echo "Invalid Admin Login";
    }
}
?>

<link rel="stylesheet" href="style.css">

<div class="container">
<div class="card">
<h1>Admin Login</h1>

<form method="POST">
<input type="text" name="username" placeholder="Admin Username" required>
<input type="password" name="password" placeholder="Password" required>

<button type="submit">Login</button>
</form>
</div>
</div>